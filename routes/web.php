<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// Front Route//
Route::get('/', [MollaController::class, 'index'])->name('/');
Route::get('/category-product/{id}', [MollaController::class, 'categoryProduct'])->name('category-product');
Route::get('/contact', [MollaController::class, 'contact'])->name('contact');
Route::get('/product-detail/{id}', [MollaController::class, 'productDetail'])->name('product-detail');
Route::get('/product-allCategory', [MollaController::class, 'allCategoryProduct'])->name('product-allCategory');
Route::get('/shop-by-brand/{id}', [MollaController::class, 'shopByBrand'])->name('shop-by-brand');

// Cart Route//
Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/show-cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/update-cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/delete-cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('order.new');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('order.complete');
Route::get('/customer-logout', [CheckoutController::class, 'customerLogout'])->name('customer.logout');

//Route::post('/delete-cart/{id}', [CartController::class, 'delete'])->name('cart.delete');



//Admin Dashboard Route//
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
//Admin Dashboard Route//

//=============Category Route Start===========//


Route::get('/add-category', [CategoryController::class, 'index'])->name('category.add')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-category', [CategoryController::class, 'create'])->name('category.new')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);

//=============Category Route End===========//


//=============Sub Category Route Start===========//

Route::get('/add-sub-category', [SubCategoryController::class, 'index'])->name('subcategory.add')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-sub-category', [SubCategoryController::class, 'create'])->name('subcategory.new')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-sub-category', [SubCategoryController::class, 'manage'])->name('subcategory.manage')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-sub-category/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);

//=============Sub Category Route End===========//

//=============Brand Route Start===========//

Route::get('/add-brand', [BrandController::class, 'index'])->name('brand.add')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-brand', [BrandController::class, 'create'])->name('brand.new')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-brand', [BrandController::class, 'manage'])->name('brand.manage')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-brand/{id}', [BrandController::class, 'delete'])->name('brand.delete')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);

//=============Brand Route End===========//

//=============Unit Route Start===========//

Route::get('/add-unit', [UnitController::class, 'index'])->name('unit.add')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-unit', [UnitController::class, 'create'])->name('unit.new')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-unit', [UnitController::class, 'manage'])->name('unit.manage')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-unit/{id}', [UnitController::class, 'update'])->name('unit.update')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);

//=============Unit Route End===========//

//=============Product Route Start===========//

Route::get('/add-product', [ProductController::class, 'index'])->name('product.add')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-product', [ProductController::class, 'create'])->name('product.new')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-product', [ProductController::class, 'manage'])->name('product.manage')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/get-sub-category-by-id', [ProductController::class, 'getSubCategory'])->name('product.get-sub-category')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
//Route::get('/get-sub-category-by-id/{id}', [ProductController::class, 'getSubCategory'])->name('product.get-sub-category')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);

//=============Product Route End===========//


//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
