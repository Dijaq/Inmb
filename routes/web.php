<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['as' => 'inicio', 'uses' => 'WebController@index']);
Route::post('/busqueda', ['as' => 'general.busqueda', 'uses' => 'WebController@busqueda']);
Route::post('/mas-propiedades', ['as' => 'inmueble.more', 'uses' => 'WebController@more']);
Route::get('/inmueble', ['as' => 'general.inmueble', 'uses' => 'WebController@inmueble']);
Route::get('/inmueble/{slug}', ['as' => 'inmueble.detail', 'uses' => 'WebController@inmueble']);


//Route::get('/tipos' ['as' => 'tipo.store', 'uses' => 'Web']);

Route::get("atributos", "AtributoController@_index");
Route::get("operaciones", "OperacionController@_index");
Route::get("tipos", "TipoController@_index");