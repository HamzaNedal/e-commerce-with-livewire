<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'auth'],function () {

    Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');

    Route::get('/users',[App\Http\Controllers\Backend\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create',[App\Http\Controllers\Backend\UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}',[App\Http\Controllers\Backend\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit',[App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('users.edit');
    Route::delete('/users/{id}',[App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('users.destroy');


    Route::get('/roles', [App\Http\Controllers\Backend\RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create',[App\Http\Controllers\Backend\RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{id}/edit',[App\Http\Controllers\Backend\RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles/{id}',[App\Http\Controllers\Backend\RoleController::class, 'show'])->name('roles.show');

    Route::get('/products',[App\Http\Controllers\Backend\ProductsController::class, 'index'])->name('products.index');
    Route::post('/products',[App\Http\Controllers\Backend\ProductsController::class, 'store'])->name('products.store');
    Route::post('/upload-product-images',[App\Http\Controllers\Backend\ProductsController::class, 'uploadImages'])->name('products.uploadimages');
    Route::post('/delete-product-media',[App\Http\Controllers\Backend\ProductsController::class, 'destroy_media'])->name('products.media.destroy');
    Route::get('/products/categories',[App\Http\Controllers\Backend\ProductsController::class, 'categories_index'])->name('products.categories.index');
    Route::get('/products/colors',[App\Http\Controllers\Backend\ProductsController::class, 'colors_index'])->name('products.colors.index');
    Route::get('/products/sizes',[App\Http\Controllers\Backend\ProductsController::class, 'sizes_index'])->name('products.sizes.index');
    Route::view('/sliders','backend.sliders.index',['active'=>'slider'])->name('sliders.index');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/details/{slug}', [App\Http\Controllers\HomeController::class, 'product_details'])->name('product_details');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
