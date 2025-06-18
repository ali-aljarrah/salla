<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function homePage() {
        $categories = Category::where('is_active', 1)->get();
        $products = Product::query()->where('is_active', 1);

        return  view('home',[
            'categories' => $categories,
            'products' => $products->paginate(12)
        ]);
    }

    public function categoryPage($id, $slug) {
        $category = Category::where('is_active', 1)->where('id', $id)->firstOrFail();
        $categories = Category::where('is_active', 1)->limit(4)->get();

        $products = Product::query()->where('is_active', 1)->where('category_id', $id);

        return view('category',[
            'category' => $category,
            'categories' => $categories,
            'products' => $products->paginate(12)
        ]);
    }

    public function productPage($id, $slug) {
        $product = Product::where('is_active', 1)->where('id', $id)->with('options')->firstOrFail();

        return view('product', [
            'product' => $product
        ]);
    }

    public function contactPage() {
        return view('contact');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%{$query}%")
            ->limit(10)
            ->get(['id', 'name', 'preview_image']);

        return response()->json($products);
    }

    public function submitContactForm(Request $request) {

        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        // Prepare the form data as an associative array
        $formData = [
            'name' => $request->fullName,
            'email' => $request->email,
            'message' => $request->message
        ];

        try {
            // Process the form...
            Mail::to(config('mail.from.address'))
                ->locale('ar')
                ->send(new ContactEmail($formData));

            return response()->json([
                'success' => true,
            ]);

        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء معالجة طلبك. يرجى المحاولة لاحقاً.'
            ], 500);
        }
    }
}
