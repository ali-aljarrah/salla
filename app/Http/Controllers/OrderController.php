<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|min:3',
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:10',
            'productOption' => 'required|exists:product_options,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Get order details
        $orderProduct = Product::where('is_active', 1)->where('id', $request->productID)->firstOrFail();
        $productOption = ProductOption::where('id', $request->productOption)->firstOrFail();

        // Calculate total with shipping
        $subtotal = $productOption->price;
        $shippingFee = $productOption->has_shipping_fee ? $productOption->shipping_fees : 0;
        $total = $subtotal + $shippingFee;

        // Format data in Arabic
        $orderData = [
            'order_id' => 'ORD-' . time(),
            'order_date' => Carbon::now()->translatedFormat('l j F Y'),
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'product' => [
                'name' => $orderProduct->name,
                'price' => $subtotal,
            ],
            'product_option' => $productOption->title,
            'shipping_fee' => $shippingFee,
            'has_shipping_fee' => $productOption->has_shipping_fee,
            'total' => $total,
            'currency' => 'ريال'
        ];

        try {
            Mail::to(config('mail.from.address'))
                ->locale('ar')
                ->send(new OrderConfirmation($orderData));

            session(['orderData' => $orderData]);

            return response()->json([
                'success' => true,
                'redirect_url' => route('order.success'),
            ]);

        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء معالجة طلبك. يرجى المحاولة لاحقاً.'
            ], 500);
        }
    }

    public function success() {
        return view('order-success', [
            'orderData' => session('orderData'),
            'products' => Product::where('is_active', 1)->limit(8)->get()
        ]);
    }
}
