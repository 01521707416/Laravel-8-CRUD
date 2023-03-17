<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
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
    return view('template.landing');
});

/* Users */
Route::get('/users', [DashBoardController::class, 'users'])->name('users');
Route::get('/users/delete/{user_id}', [DashBoardController::class, 'user_delete'])->name('user.delete');
Route::get('/users/edit/{user_id}', [DashBoardController::class, 'user_edit'])->name('user.edit');
Route::post('/users/edit/{user_id}', [DashBoardController::class, 'user_update'])->name('user.update');


/* Products */
Route::get('/productsIndex', [ProductController::class, 'add_products'])->name('productsIndex');
Route::post('/product/insert', [ProductController::class, 'insert'])->name('product');
Route::get('/product/list', [ProductController::class, 'view'])->name('product.list');
Route::get('/product/delete/{product_id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/edit/{product_id}', [ProductController::class, 'update'])->name('product.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('template.index');
    })->name('dashboard');
});
