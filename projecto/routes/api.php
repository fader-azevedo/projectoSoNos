<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('listarTodasMensalidades','MensalidadeController@listarTodasMensalidades')->name('listarTodasMensalidades');
Route::post('getDevedoresMes','MensalidadeController@getDevedoresMes')->name('getDevedoresMes');
Route::post('listarPorAluno','MensalidadeController@listarPorAluno')->name('listarPorAluno');
Route::post('listarPorMes','MensalidadeController@listarPorMes')->name('listarPorMes');
Route::post('getMesAPagar','MensalidadeController@getMesAPagar')->name('getMesAPagar');
Route::post('exportaDevedores','MensalidadeController@exportaDevedores')->name('exportaDevedores');
//Route::get('/fact','MensalidadeController@factura');

