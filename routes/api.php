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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');

Route::post('validaqr','InvitationController@validarQr');

Route::group(['middleware' => 'jwt.verify'], function(){
    
    Route::post('user/logout', 'APILoginController@logout');

    Route::get('user', function(Request $request) {
        try{
            $user = auth()->guard('api')->user();
        }catch(Exception $e){
            return response()->json(['error'=>'error de seguridad'],500);
        }
        return $user ;
    });

    Route::post('nuevoinvitado', 'InvitadoController@store');
    Route::get('invitados', 'InvitadoController@index');
    Route::get('invitaciones/{invitado}', 'InvitadoController@invitacionesById');

    Route::post('/nuevainvitacion/{invitado}','InvitationController@store');
    Route::post('/frecuencia','FrecuenciaController@store');


    




    






});


//Casas
Route::get('/casa/{casa}','CasaController@show');


