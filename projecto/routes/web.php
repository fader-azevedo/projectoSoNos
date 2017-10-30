<?php

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
Route::get('/','HomeController@index');
Route::get('/logon','HomeController@logon');
Route::get('/factura','MensalidadeController@factura');

Route::group(['prefix'=>'mensalidade'], function (){
    Route::get('/','MensalidadeController@index');
    Route::get('registar','MensalidadeController@registarMensalidade');
});

Route::group(['prefix'=>'extras'], function (){
    Route::get('/','HomeController@lock');
});



Auth::routes();
//Route::post('listar','MensalidadeController@index')->name('listar');
//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::group(['prefix'=>'aluno'], function (){
//    Route::get('/','AlunoController@index');
//});
//Route::group(['prefix'=>'mensalidade'], function (){
//    Route::get('/','MensalidadeController@index');
//});

