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


Route::get('reclamos',['as'=>'reclamo.get','uses'=>'reclamoController@getReclamos']);
Route::get('categorias',['as'=>'categoria.get','uses'=>'categoriaController@getCategorias']);
Route::post('userRegister',['as'=>'user.register','uses'=>'userapiController@registrar']);
Route::post('guardarReclamo',['as'=>'reclamo.store','uses'=>'reclamoController@guardar']);
Route::get('obtenerReclamos/{id}',['as'=>'obtenerReclamos','uses'=>'reclamoController@obtenerReclamos']);