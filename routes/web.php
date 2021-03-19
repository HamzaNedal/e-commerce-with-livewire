<?php

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

Auth::routes();
Route::group(['prefix'=>'admin','as'=>'admin.'],function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');

    Route::get('/users',[App\Http\Controllers\Backend\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create',[App\Http\Controllers\Backend\UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}',[App\Http\Controllers\Backend\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit',[App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('users.edit');
    Route::delete('/users/{id}',[App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('users.destroy');


    Route::get('/roles', [App\Http\Controllers\Backend\RoleController::class, 'index'])->name('roles');
    Route::get('/roles/create',[App\Http\Controllers\Backend\RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{id}/edit',[App\Http\Controllers\Backend\RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles/{id}',[App\Http\Controllers\Backend\RoleController::class, 'show'])->name('roles.show');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
