<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraficosController;
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTA PARA EL PDF DE CATEGORIAS
Route::get('categorias/pdf', [App\Http\Controllers\CategoriaController::class, 'pdf'])->name('categorias.pdf');

//RUTA PARA EL PDF DE PRODUCTOS
Route::get('productos/pdf', [App\Http\Controllers\ProductoController::class, 'pdf'])->name('productos.pdf');


Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');


// Rutas para mostrar la lista de productos, crear un nuevo producto y guardar un nuevo producto.
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

// Rutas para editar un producto existente, actualizar los datos del producto y eliminar un producto.
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/{producto}/show', [ProductoController::class, 'show'])->name('productos.show');

Route::get('/graficos', [GraficosController::class, 'mostrarGrafico'])->name('graficos');




