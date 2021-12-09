<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ShipperController;
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

Route::get('/', function ()
{
   return redirect(route('user.home')); 
});

Route::get('/admin/login', [AuthController::class, 'get'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'post'])->name('admin.login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index']);
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

Route::post('/detail/register/check', [ShipperController::class, 'register'])->name('user.register');
Route::get('/recruit', [RecruitmentController::class, 'index'])->name('recruitment.list');
Route::get('/recruit/detail/{recruitID}', [RecruitmentController::class, 'detail'])->name('recruitment.detail');
Route::get('/recruit/detail/register/{recruitID}', [RecruitmentController::class, 'register'])->name('recruitment.register');
Route::get('product/detail/{productId}', [ProductController::class, 'detailProduct'])->name('product.detail');
Route::get('/home',[ProductController::class, 'listProductsAndCategories'])->name('user.home');
Route::get('/home/{categoryId}', [ProductController::class, 'groupProduct'])->name('groupProduct');
