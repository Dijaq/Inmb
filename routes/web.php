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

Route::get('/mis-publicaciones', ['as' => 'mispublicaciones', 'uses' => 'WebControllerIntranet@index']);
Route::delete('/mis-publicaciones/{id}', ['as' => 'mi-inmueble.delete', 'uses' => 'WebControllerIntranet@destroy']);


//Route::get('/tipos' ['as' => 'tipo.store', 'uses' => 'Web']);

/*Route::get("atributos", "AtributoController@_index");
Route::get("operaciones", "OperacionController@_index");
Route::get("/tipos", "TipoController@_index");*/

//Label contenido
Route::get('tipos', ['as' => 'tipo.index', 'uses' => 'TipoController@index']);
Route::get('tipos/crear', ['as' => 'tipo.create', 'uses' => 'TipoController@create']);
Route::post('tipos', ['as' => 'tipo.store', 'uses' => 'TipoController@store']);
Route::get('tipos/{id}', ['as' => 'tipo.edit', 'uses' => 'TipoController@edit']);
Route::put('tipos/{id}', ['as' => 'tipo.update', 'uses' => 'TipoController@update']);
Route::delete('tipos/{id}', ['as' => 'tipo.delete', 'uses' => 'TipoController@destroy']);

Route::get('lista_atributos/{id}', ['as' => 'atributo.index', 'uses' => 'AtributoController@index']);
Route::get('atributos_crear/{id}', ['as' => 'atributo.create', 'uses' => 'AtributoController@create']);
Route::post('atributos', ['as' => 'atributo.store', 'uses' => 'AtributoController@store']);
Route::get('atributos/{id}', ['as' => 'atributo.edit', 'uses' => 'AtributoController@edit']);
Route::put('atributos/{id}', ['as' => 'atributo.update', 'uses' => 'AtributoController@update']);
Route::delete('atributos/{id}', ['as' => 'atributo.delete', 'uses' => 'AtributoController@destroy']);

Route::get('lista_servicios/{id}', ['as' => 'servicio.index', 'uses' => 'ServicioController@index']);
Route::get('servicios_crear/{id}', ['as' => 'servicio.create', 'uses' => 'ServicioController@create']);
Route::post('servicios', ['as' => 'servicio.store', 'uses' => 'ServicioController@store']);
Route::get('servicios/{id}', ['as' => 'servicio.edit', 'uses' => 'ServicioController@edit']);
Route::put('servicios/{id}', ['as' => 'servicio.update', 'uses' => 'ServicioController@update']);
Route::delete('servicios/{id}', ['as' => 'servicio.delete', 'uses' => 'ServicioController@destroy']);

Route::get('operaciones', ['as' => 'operacion.index', 'uses' => 'OperacionController@index']);
Route::get('operaciones/crear', ['as' => 'operacion.create', 'uses' => 'OperacionController@create']);
Route::post('operaciones', ['as' => 'operacion.store', 'uses' => 'OperacionController@store']);
Route::get('operaciones/{id}', ['as' => 'operacion.edit', 'uses' => 'OperacionController@edit']);
Route::put('operaciones/{id}', ['as' => 'operacion.update', 'uses' => 'OperacionController@update']);
Route::delete('operaciones/{id}', ['as' => 'operacion.delete', 'uses' => 'OperacionController@destroy']);

Route::get('inmuebles', ['as' => 'inmueble.index', 'uses' => 'InmuebleController@index']);
Route::get('seleccion_tipo', ['as' => 'inmueble.seleccion', 'uses' => 'InmuebleController@seleccionar_tipo']);
Route::post('inmuebles/crear', ['as' => 'inmueble.create', 'uses' => 'InmuebleController@create']);
Route::post('inmuebles', ['as' => 'inmueble.store', 'uses' => 'InmuebleController@store']);
Route::get('inmuebles/{id}', ['as' => 'inmueble.edit', 'uses' => 'InmuebleController@edit']);
Route::put('inmuebles/{id}', ['as' => 'inmueble.update', 'uses' => 'InmuebleController@update']);
Route::delete('inmuebles/{id}', ['as' => 'inmueble.delete', 'uses' => 'InmuebleController@destroy']);

Route::get('usuarios', ['as' => 'usuario.index', 'uses' => 'UsuarioController@index']);
Route::get('usuarios/crear', ['as' => 'usuario.create', 'uses' => 'UsuarioController@create']);
Route::post('usuarios', ['as' => 'usuario.store', 'uses' => 'UsuarioController@store']);
Route::get('usuarios/{id}', ['as' => 'usuario.edit', 'uses' => 'UsuarioController@edit']);
Route::put('usuarios/{id}', ['as' => 'usuario.update', 'uses' => 'UsuarioController@update']);
Route::delete('usuarios/{id}', ['as' => 'usuario.delete', 'uses' => 'UsuarioController@destroy']);

Auth::routes();

Route::get('data', ['as' => 'data', 'uses' => 'Data@index']);
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
