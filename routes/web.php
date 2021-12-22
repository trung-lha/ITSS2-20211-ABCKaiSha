<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ShipperController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Recruitment;
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

Route::post('/detail/register/check', [ShipperController::class, 'register'])->name('user.register');
Route::get('/recruit', [RecruitmentController::class, 'index'])->name('recruitment.list');
Route::get('/recruit/detail/{recruitID}', [RecruitmentController::class, 'detail'])->name('recruitment.detail');
Route::get('/recruit/detail/register/{recruitID}', [RecruitmentController::class, 'register'])->name('recruitment.register');
Route::get('product/detail/{productId}', [ProductController::class, 'detailProduct'])->name('product.detail');
Route::get('/home',[ProductController::class, 'listProductsAndCategories'])->name('user.home');
Route::get('/home/{categoryId}', [ProductController::class, 'groupProduct'])->name('groupProduct');


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

    /**
     * Category
     */

    // GET - index
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');
    // GET - create
    Route::get('/categories/create', [CategoryController::class, 'create']);
    // POST - store
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    // GET - edit
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
    // PATCH
    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    // DELETE - destroy
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy']);


    /**
     * Recruit
     */

    // GET - index_ad
    Route::get('/recruit', [RecruitmentController::class, 'index_ad'])->name('recruit');
    // GET - create
    Route::get('/recruit/create', [RecruitmentController::class, 'create']);
    // POST - store
    Route::post('/recruit', [RecruitmentController::class, 'store'])->name('recruit.store');
    // GET - edit
    Route::get('/recruit/{id}/edit', [RecruitmentController::class, 'edit']);
    // PATCH
    Route::patch('/recruit/{id}', [RecruitmentController::class, 'update'])->name('recruit.update');
});
