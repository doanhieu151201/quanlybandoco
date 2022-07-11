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

use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\NhaCCController;
use App\Http\Controllers\billbanController;
use App\Http\Controllers\billnhapController;
use App\Http\Controllers\cbillbanController;
use App\Http\Controllers\cbillnhapController;
use App\Http\Controllers\PhanhoiController;
use App\Http\Controllers\KhachhangController;   


Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});



Route::get('/categorys', function () {
    return view('Categories');
});
Route::get('/news', function () {
    return view('New');
});
Route::get('/nhap', function () {
    return view('Nhap');
});
Route::get('/ban', function () {
    return view('Ban');
});
Route::get('/chitietban', function () {
    return view('cban');
});
Route::get('/chitietnhap', function () {
    return view('cnhap');
});

Route::get('/khach', function () {
    return view('Khachhang');
});
Route::get('/nhacc', function () {
    return view('NhaCC');
});
Route::get('/nhanvien', function () {
    return view('nhanvien');
});


Route::get('/sanpham',[SanPhamController::class,'Get']);
Route::get('/sanpham/{id}',[SanPhamController::class,'show']);
Route::post('/sanpham/update/{id}',[SanPhamController::class,'update']);




Route::get('/category',[CategoriesController::class,'getall']);
Route::get('/category/{id}',[CategoriesController::class,'show']);
Route::post('/category/update/{id}',[CategoriesController::class,'update']);

Route::get('/billban',[billbanController::class,'Get']);
Route::get('/billban/{id}',[billbanController::class,'show']);
Route::post('/billban/update/{id}',[billbanController::class,'update']);


Route::get('/billnhap',[billnhapController::class,'Get']);
Route::get('/billnhap',[billnhapController::class,'Get']);
Route::get('/billnhap/{id}',[billnhapController::class,'show']);
Route::post('/billnhap/update/{id}',[billnhapController::class,'update']);

Route::get('/cban',[cbillbanController::class,'Get']);
Route::get('/cnhap',[cbillnhapController::class,'Get']);


Route::get('/khachs',[KhachhangController::class,'Get']);
Route::get('/khachs/{id}',[KhachhangController::class,'show']);
Route::post('/khachs/update/{id}',[KhachhangController::class,'update']);

Route::get('/new',[NewController::class,'Get']);
Route::get('/new/{id}',[NewController::class,'show']);
Route::post('/new/update/{id}',[NewController::class,'update']);


Route::get('/nhanvienn',[NhanvienController::class,'Get']);


Route::get('/nhaccs',[NhaCCController::class,'getall']);
Route::get('/nhaccs',[NhaCCController::class,'show']);
Route::get('/nhaccs',[NhaCCController::class,'update']);



Route::get('/cbillnhaps',[cbillnhapController::class,'Get']);
Route::get('/cbillnhaps',[cbillnhapController::class,'show']);
Route::get('/cbillnhaps',[cbillnhapController::class,'update']);


Route::get('/user', function () {
    return view('user');
});