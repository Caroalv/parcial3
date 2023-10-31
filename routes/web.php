<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productocontoller;


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

Route::get('/products', [productocontoller::class, 'index'])->name('product.index');
Route::get('/products/create', [productocontoller::class, 'create'])->name('product.create');
Route::post('/products', [productocontoller::class, 'store'])->name('product.store');
Route::get('/products/{product}/edit', [productocontoller::class, 'edit'])->name('product.edit');
Route::put('/products/{product}', [productocontoller::class, 'update'])->name('product.update');
Route::delete('/products/{product}', [productocontoller::class, 'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit', 'productocontoller@edit')->name('product.edit');



