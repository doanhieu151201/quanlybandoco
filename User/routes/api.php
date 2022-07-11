<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sanphamcontroller;
use App\Http\Controllers\loaispcontroller;
use App\Http\Controllers\tintuccontroller;
use App\Http\Controllers\billbancontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\khachhangcontroller;
use App\Http\Controllers\cbillbancontroller;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('sanphams', sanphamcontroller::class);
Route::resource('loaisps', loaispcontroller::class);
Route::resource('tintucs', tintuccontroller::class);
Route::resource('billbans', billbancontroller::class);
Route::resource('users', Usercontroller::class);
Route::resource('khachhangs', khachhangcontroller::class);
Route::resource('cbillbans', cbillbancontroller::class);




