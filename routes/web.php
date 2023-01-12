<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

// PUBLICAS
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('Inicio');
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginVerify'])->name('login.verify');
Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'registerVerify'])->name('register.verify');
Route::get('/contacto', [App\Http\Controllers\HomeController::class, 'contact'])->name('Contacto');
Route::get('/producto/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('Detalles');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/{id}/update', [UserController::class, 'profileUpdate'])->name('profile.update');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/carrito/{id}', [App\Http\Controllers\ShopingCarController::class, 'index'])->name('Mi-Carrito');
    Route::post('/anadir', [App\Http\Controllers\ShopingCarController::class, 'addShopingCar'])->name('add-shoping');
    Route::put('/update-car/{id}', [App\Http\Controllers\ShopingCarController::class, 'updateShopingCar'])->name('update-shoping');
    Route::delete('/delete-car/{id}', [App\Http\Controllers\ShopingCarController::class, 'destroy'])->name('destroy-shoping');

    // Checkout
    Route::get('shopping-cart/{cart}/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('shopping-cart/{cart}/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('billingAddress', [CheckoutController::class, 'createAddress'])->name('billingAddress.create');
    Route::post('billingAddress', [CheckoutController::class, 'storeAddress'])->name('billingAddress.store');
});
