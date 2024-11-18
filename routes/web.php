<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/admin/product', App\Http\Controllers\ProductController::class, [
    'except' => ['show'],    
])->middleware(['auth', 'isAdmin']);

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');

Route::post('admin/getProducts', 'App\Http\Controllers\ProductController@getProducts')->name('product.getProducts');
Route::get('product/{product}', 'App\Http\Controllers\ProductController@show')->name('product');

Route::post('admin/get-terms', 'App\Http\Controllers\ProductTermController@getTerms')->name('terms.getTerms');
Route::resource('/admin/term/category', App\Http\Controllers\ProductTermController::class, [
    'except' => ['show'],    
])->middleware(['auth','isAdmin']);

Route::resource('/admin/term/size', App\Http\Controllers\ProductTermController::class, [
    'except' => ['show'],    
])->middleware(['auth','isAdmin']);

Route::resource('/admin/term/color', App\Http\Controllers\ProductTermController::class, [
    'except' => ['show'],    
])->middleware(['auth','isAdmin']);

Route::resource('/cart', App\Http\Controllers\CartController::class)->middleware('auth');

// Route::get('/product', function() {
//     return view('product'); 
// })->name('product');
// Route::get('/shop', 'App\Http\Controllers\ProductController@index')->name('shop');

// Route::post('/cart/{slug}', function() {
//     return view('cart'); 
// })->name('cart');

Route::get('/checkout', 'App\Http\Controllers\OrderController@create')->middleware('auth')->name('checkout');
Route::post('/order', 'App\Http\Controllers\OrderController@store')->middleware('auth')->name('order.create');

Route::get('/account', function() {
    return view('account');
})->middleware('auth')->name('account');

Route::get('admin/', function() {
    return view('layouts.admin', ['title' => 'dashboard']);
});

Route::get('admin/dashboard', function() {
    return view('layouts.admin', ['title' => 'dashboard']);
})->name('dashboard');