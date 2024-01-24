<?php

use Illuminate\Support\Facades\Route;
use Modules\Usuario\app\Http\Controllers\UsuarioController;

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

Route::prefix('usuarios')->controller(UsuarioController::class)->group(function () {

    Route::get('/','get')->name('usuarios.get');
    Route::get('/find','find')->name('usuarios.find');
    Route::post('/','store')->name('usuarios.store');
    Route::put('/update','update')->name('usuarios.update');
    Route::delete('/delete','destroy')->name('usuarios.destroy');

});
