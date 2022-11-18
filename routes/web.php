<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Website\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//    Dashboard View
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/add-category',[CategoryController::class,'index'])->name('add.category');
    Route::get('/manage-category',[CategoryController::class,'manage'])->name('manage.category');
    Route::get('/add-sub-category',[SubCategoryController::class,'index'])->name('add.sub.category');
    Route::get('/manage-sub-category',[SubCategoryController::class,'manage'])->name('manage.sub.category');
    Route::get('/add-child-category',[ChildCategoryController::class,'index'])->name('add.child.category');
    Route::get('/manage-child-category',[ChildCategoryController::class,'manage'])->name('manage.child.category');
    Route::get('/add-brand',[BrandController::class,'index'])->name('add.brand');
    Route::get('/manage-brand',[BrandController::class,'manage'])->name('manage.brand');
    Route::get('/add-unit',[UnitController::class,'index'])->name('add.unit');
    Route::get('/manage-unit',[UnitController::class,'manage'])->name('manage.unit');
    Route::get('/add-color',[ColorController::class,'index'])->name('add.color');
    Route::get('/manage-color',[ColorController::class,'manage'])->name('manage.color');
    Route::get('/add-size',[SizeController::class,'index'])->name('add.size');
    Route::get('/manage-size',[SizeController::class,'manage'])->name('manage.size');
    Route::get('/add-product',[ProductController::class,'index'])->name('add.product');
    Route::get('/manage-product',[ProductController::class,'manage'])->name('manage.product');

    //    Category CRUD
    Route::post('/new-category',[CategoryController::class,'create'])->name('create.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('delete.category');
    Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('update.category');
//    Sub Category CRUD
    Route::post('/new-sub-category',[SubCategoryController::class,'create'])->name('create.sub.category');
    Route::get('/edit-sub-category/{id}',[SubCategoryController::class,'edit'])->name('edit.sub.category');
    Route::get('/delete-sub-category/{id}',[SubCategoryController::class,'delete'])->name('delete.sub.category');
    Route::post('/update-sub-category/{id}',[SubCategoryController::class,'update'])->name('update.sub.category');
// Child Category CRUD
    Route::post('/new-child-category',[ChildCategoryController::class,'create'])->name('create.child.category');
    Route::get('/get-sub-category-by-category',[ChildCategoryController::class,'getSubCategory'])->name('get-sub-category-by-category');
    Route::get('/get-child-category-by-sub-category',[ChildCategoryController::class,'getChildCategory'])->name('get-child-category-by-sub-category');
    Route::get('/edit-child-category/{id}',[ChildCategoryController::class,'edit'])->name('edit.child.category');
    Route::get('/delete-child-category/{id}',[ChildCategoryController::class,'delete'])->name('delete.child.category');
    Route::post('/update-child-category/{id}',[ChildCategoryController::class,'update'])->name('update.child.category');
//    brand CRUD
    Route::post('/new-brand',[BrandController::class,'create'])->name('create.brand');
    Route::get('/edit-brand/{id}',[BrandController::class,'edit'])->name('edit.brand');
    Route::get('/delete-brand/{id}',[BrandController::class,'delete'])->name('delete.brand');
    Route::post('/update-brand/{id}',[BrandController::class,'update'])->name('update.brand');
    //    unit CRUD
    Route::post('/new-unit',[UnitController::class,'create'])->name('create.unit');
    Route::get('/edit-unit/{id}',[UnitController::class,'edit'])->name('edit.unit');
    Route::get('/delete-unit/{id}',[UnitController::class,'delete'])->name('delete.unit');
    Route::post('/update-unit/{id}',[UnitController::class,'update'])->name('update.unit');
    //    color CRUD
    Route::post('/new-color',[ColorController::class,'create'])->name('create.color');
    Route::get('/edit-color/{id}',[ColorController::class,'edit'])->name('edit.color');
    Route::get('/delete-color/{id}',[ColorController::class,'delete'])->name('delete.color');
    Route::post('/update-color/{id}',[ColorController::class,'update'])->name('update.color');
//    size CRUD
    Route::post('/new-size',[SizeController::class,'create'])->name('create.size');
    Route::get('/edit-size/{id}',[SizeController::class,'edit'])->name('edit.size');
    Route::get('/delete-size/{id}',[SizeController::class,'delete'])->name('delete.size');
    Route::post('/update-size/{id}',[SizeController::class,'update'])->name('update.size');
//    Product CRUD
    Route::post('/new-product',[ProductController::class,'create'])->name('create.product');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::get('/delete-product/{id}',[ProductController::class,'delete'])->name('delete.product');
    Route::post('/update-product/{id}',[ProductController::class,'update'])->name('update.product');
    Route::get('/detail-product/{id}',[ProductController::class,'productDetail'])->name('detail.product');
});
