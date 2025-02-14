<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index']);
Route::get('/productId/{id}', [ProductController::class, 'productId']);
Route::post('/productId/{id}', [ProductController::class, 'productId']);
Route::get('/register', [ProductController::class, 'store']);
Route::post('/register', [ProductController::class, 'store']);
Route::get('/search', [ProductController::class, 'search']);