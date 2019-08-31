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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register/residente', function(){
    return view('auth.registerResidente');
});

Route::get('register/guardia', function(){
    return view('auth.registerGuardia');
});

//CASAS 
Route::get('casas','CasaController@index');
Route::get('casas/create', 'CasaController@create');
Route::delete('casas/{casa}', 'CasaController@destroy');
Route::post('casas','CasaController@store');
Route::get('casas/edit/{casa}','CasaController@edit');
Route::patch('casas/{casa}','CasaController@update');



//RESIDENTES
Route::get('residentes','UserResidenteController@index');
Route::get('residentes/create', 'UserResidenteController@create');
Route::delete('residentes/{residente}', 'UserResidenteController@destroy');
Route::post('residentes','UserResidenteController@store');
Route::get('residentes/edit/{residente}','UserResidenteController@edit');
Route::patch('residentes/{residente}','UserResidenteController@update');


//reporte Invitaciones
Route::get('invitations','InvitationController@index');
Route::get('invitations/inactivar/{invitation}','InvitationController@inactivar');

Route::get('invitations/ver/{invitation}','InvitationController@show');



Route::post('invitations','InvitationController@fetch_data');



Route::group(['middleware' => 'auth'],function(){


});

