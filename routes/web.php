<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'homePage'])->name('homePage');

Route::get('/product/{id}/{slug}', [HomeController::class, 'productPage'])->name('productPage');
Route::get('/category/{id}/{slug}', [HomeController::class, 'categoryPage'])->name('categoryPage');
Route::get('/contact', [HomeController::class, 'contactPage'])->name('contactPage');
Route::get('/retrun-policy', function() {
    return view('retrun-policy');
});
Route::get('/privacy-policy', function() {
    return view('privacy-policy');
});
Route::get('/conditions-policy', function() {
    return view('conditions-policy');
});

Route::post('/submit-order', [OrderController::class, 'submit'])->name('orders-submit');
Route::get('order/success', [OrderController::class, 'success'])->name('order.success');

Route::post('/search-products', [HomeController::class, 'search'])->name('products.search');

Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact.submit');
