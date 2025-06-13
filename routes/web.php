<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'homePage'])->name('homePage');

Route::get('/product/{id}/{slug}', [HomeController::class, 'productPage'])->name('productPage');
Route::get('/category/{id}/{slug}', [HomeController::class, 'categoryPage'])->name('categoryPage');
Route::get('/contact', [HomeController::class, 'contactPage'])->name('contactPage');

// Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact.submit');
