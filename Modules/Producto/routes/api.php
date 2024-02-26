<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Producto\app\Http\Controllers\ProductoController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::prefix('productos')->controller(ProductoController::class)->group(function () {

    Route::get('/','get')->name('productos.get');
    Route::get('/find','find')->name('productos.find');
    Route::post('/','store')->name('productos.store');
    Route::put('/update','update')->name('productos.update');
    Route::delete('/delete','destroy')->name('productos.destroy');

});
