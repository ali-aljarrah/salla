<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|min:3',
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:10',
            'product-option' => 'required|exists:product_options,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {


            // Send confirmation email
            // Mail::to(config('mail.from.address'))->send(new OrderConfirmation($order));

            return response()->json([
                'success' => true,
                'message' => 'Order submitted successfully!',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your order.'
            ], 500);
        }
    }
}
