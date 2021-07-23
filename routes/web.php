<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SizeController;
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
    return view('dashboard.home');
})->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard',function(){
    return view('dashboard.home');
})->name('home');

// Middleware Auth
Route::middleware(['auth:sanctum'])->group(function () {

    // Category
    Route::resource('category',CategoryController::class);
    Route::delete('category/{id}',[CategoryController::class,'destroy']);

    // Brand
    Route::resource('brand',BrandController::class);
    Route::delete('brand/{id}',[BrandController::class,'destroy']);

    // Size
    Route::resource('size',SizeController::class);
    Route::delete('size/{id}',[SizeController::class,'destroy']);
});

