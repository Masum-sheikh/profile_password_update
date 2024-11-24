<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UpdateController;
use Illuminate\support\Facades\Auth;
// Category resource route
Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/update', [UpdateController::class, 'update'])->name('update');
Route::post('/password_update', [UpdateController::class, 'password_update'])->name('password_update');
Route::get('/password_show', [UpdateController::class, 'password_show'])->name('password_show');
