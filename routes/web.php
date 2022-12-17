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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('Inicio');
Route::get('/contacto', [App\Http\Controllers\HomeController::class, 'contact'])->name('Contacto');
Route::get('/producto/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('Detalles');
Route::get('/anadir/{id}', [App\Http\Controllers\ProductsController::class, 'addShoping'])->name('add-shoping');
