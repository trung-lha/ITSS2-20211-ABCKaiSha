<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyIntroController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ShipperController;
use App\Models\Category;
use App\Models\Contact;
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
Route::get('/home/{categoryId}/{month}', [ProductController::class, 'groupProduct'])->name('groupProduct');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('contact.post');
Route::get('/company-intro', [CompanyIntroController::class, 'index'])->name('intro');

// TEST: ko xoa
Route::get('plan', [PlanController::class, 'index'])->name("plan.index");
Route::get('/plans', [PlanController::class, 'create'])->name('test-plan');
Route::post('/plans', [PlanController::class, 'store'])->name('plan.store');
Route::post('/plans/update/{id}', [PlanController::class, 'update'])->name('plans.update');
Route::get('/plans/{id}/delete', [PlanController::class, 'destroy']);
// end TEST PLAN

Route::get('admin/login', [AuthController::class, 'get'])->middleware('exits_user')->name('admin.login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'post'])->name('admin.login.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/products', [ProductController::class, 'index'])->name('admin.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::get('/categories', [CategoryController::class, 'index'])->name('category');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy']);

    Route::get('/recruit', [RecruitmentController::class, 'index_ad'])->name('recruit');
    Route::get('/recruit/create', [RecruitmentController::class, 'create'])->name('recruit.create');
    Route::post('/recruit', [RecruitmentController::class, 'store'])->name('recruit.store');
    Route::get('/recruit/{id}/edit', [RecruitmentController::class, 'edit'])->name('recruit.edit');
    Route::patch('/recruit/{id}', [RecruitmentController::class, 'update'])->name('recruit.update');
    Route::delete('/recruit/{id}/delete', [RecruitmentController::class, 'destroy'])->name('recruit.delete');

    Route::get('/contacts', [ContactController::class, 'index_ad'])->name('contacts');
    Route::patch('/contacts/{id}/status', [ContactController::class, 'update_status']);
    Route::post('/contacts/status/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/candidate', [CandidateController::class, 'index'])->name('admin.candidate');
    Route::post('/candidate/store', [CandidateController::class, 'store'])->name('admin.candidate.store');
    Route::post('/candidate/process/{candidateId}', [CandidateController::class, 'candidateProcess'])->name('admin.candidate.process');

    Route::get('/plans', [PlanController::class, 'index_ad'])->name('admin.plans');
});
