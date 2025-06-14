<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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

    // public function submitContactForm(Request $request) {

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //         'g-recaptcha-response' => 'required|recaptcha'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'errors' => $validator->errors()->messages()
    //         ], 422);
    //     }

    //     // Prepare the form data as an associative array
    //     $formData = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'subject' => $request->subject ?? 'Contact Form Submission', // Default subject if not provided
    //         'message' => $request->message
    //     ];


    //     // Process the form...
    //     Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($formData));

    //     return response()->json([
    //         'success' => true,
    //         'message' => __('messages.contact_success')
    //     ]);
    // }
}
