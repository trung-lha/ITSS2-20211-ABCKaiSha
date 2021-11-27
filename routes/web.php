<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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
})->name('home');

Route::prefix('home')->group(function () {
    // url/home/category/{id}
    Route::get('/category/{id}', [CategoryController::class, 'show']);
});

Route::get('/admin/login', [AuthController::class, 'get'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'post'])->name('admin.login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // url/admin/products
    Route::get('/products', [ProductController::class, 'index'])->name('admin.index');
    // url/admin/products/create
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.create');
    // url/admin/products
    Route::post('/products', [ProductController::class, 'store'])->name('admin.store');
    // url/products/{id}/edit
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
    // url/products/{id}
    Route::put('/products/{id}', [ProductController::class, 'update']);
    // url/admin/products/{id}
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('user')->group(function () {
    Route::get('/home',[ProductController::class, 'listProductsAndCategories'])->name('user.home');
    Route::get('detail/{productId}', [ProductController::class, 'detailProduct'])->name('product.detail');
});
