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
Route::get('listarPorAluno','MensalidadeController@listarPorAluno')->name('listarPorAluno');
Route::post('listarPorMes','MensalidadeController@listarPorMes')->name('listarPorMes');
//Route::post('listarPorAluno2','MensalidadeController@listarPorAluno2')->name('listarPorAluno2');