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



Route::post('login', 'Api\Auth\LoginController@login');
Route::get('categorias', 'Api\Auth\CategoriaController@index');
Route::get('category_id/{id}', 'Api\Auth\CategoriaController@edit');





Route::middleware('auth:api')->group(function () {
	//categorias
    Route::put('update_category/{id}', 'Api\Auth\CategoriaController@update');
	Route::put('desactivar/{id}', 'Api\Auth\CategoriaController@disabled');
	Route::put('activar/{id}', 'Api\Auth\CategoriaController@enabled');
	Route::post('crear', 'Api\Auth\CategoriaController@create');

	//ventas
	Route::get('ventas', 'Api\Auth\VentaController@index');
	Route::get('consultarcc/{id}', 'Api\Auth\VentaController@consultacedula');
	Route::get('tipoventa', 'Api\Auth\VentaController@tipoventa');
	Route::get('product_cod/{id}', 'Api\Auth\VentaController@getproductocod');
	
	
	
	});




