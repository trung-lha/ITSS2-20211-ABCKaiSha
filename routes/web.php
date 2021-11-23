<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::prefix('home')->group(function () {
    // url/home/category/{id}
    Route::get('/category/{id}', [CategoryController::class, 'show']);
});

Route::prefix('admin')->group(function () {
    // url/admin/products
    Route::get('/products', [ProductController::class, 'index'])->name('admin.index');
    // url/admin/products/create
    Route::get('/products/create', [ProductController::class, 'create']);
});
