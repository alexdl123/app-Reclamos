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

Route::resource('persona','personaController');
Route::resource('municipio','municipioController');
Route::resource('distrito','distritoController');
Route::resource('uv','uvController');
Route::resource('reclamo','reclamoController');
Route::resource('categoria','categoriaController');
Route::get('getReclamos',['as'=>'getReclamos','uses'=>'reclamoController@getReclamos']);
Route::get('getUvs',['as'=>'getUvs','uses'=>'uvController@getUvs']);

Route::get('estadistico',['as'=>'reclamo.estadistico','uses'=>'reclamoController@index2']);

Route::get('getReclamosApi',['as'=>'reclamo.get','uses'=>'reclamoController@getCantidadReclamos']);


//Route::put('municipio/{id}',['as'=>'municipio.eliminar','uses'=>'municipioController@eliminar']);



//Route::get('persona/{id}/tarjetaCredito',['as'=>'tarjetaCre.index','uses'=>'tarjetaCreditoController@index']);
/*
Route::get('/',function(){

	$user = App\User::findOrFail(1);

	return $user->persona;
});
*/