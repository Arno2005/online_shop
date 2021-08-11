<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\HistoryController;

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

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/new', [ProductController::class, 'create']);
Route::post('/products/new', [ProductController::class, 'store']);

Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/edit/{id}', [ProductController::class, 'update']);

Route::post('/products/delete/{id}', [ProductController::class, 'delete']);

Route::post('/products/toCart/{id}', [CartController::class, 'store']);

Route::get('/carts', [CartController::class, 'index']);

Route::post('/carts/delete/{id}', [CartController::class, 'delete']);

Route::post('/carts/plus/{id}', [CartController::class, 'plus']);
Route::post('/carts/minus/{id}', [CartController::class, 'minus']);

Route::get('/histories', [HistoryController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
