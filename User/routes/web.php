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

Route::get('/', function () {
    return view('index');
});

Route::get('/categori', function () {
    return view('categori');
});
Route::get('/gom', function () {
    return view('product_gom');
});
Route::get('/hoathach', function () {
    return view('product_hoa');
});
Route::get('/tranh', function () {
    return view('product_tranh');
});
Route::get('/tien', function () {
    return view('product_tien');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/ssp/{id}', function () {
    return view('singlesp');
});
Route::get('/sblog/{id}', function () {
    return view('single_blog');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});


Route::get('/login', function () {
    return view('login');
});
