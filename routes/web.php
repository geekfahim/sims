<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    Route::get('api/categories', [CategoryController::class,'getCategoriesJSON']);

    // Brand
    Route::resource('brand',BrandController::class);
    Route::delete('brand/{id}',[BrandController::class,'destroy']);
    Route::get('api/brand', [BrandController::class,'getBrandJSON']);


    // Size
    Route::resource('size',SizeController::class);
    Route::delete('size/{id}',[SizeController::class,'destroy']);
    Route::get('api/size', [SizeController::class,'getSizeJSON']);

    //Products
    Route::resource('product',ProductController::class);
});


Route::get('/activity',[ActivityController::class,'getActivity'])->name('activity');
