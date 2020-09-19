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
Route::get('/busqueda', ['as' => 'general.busqueda', 'uses' => 'WebController@busqueda']);
Route::post('/mas-propiedades', ['as' => 'inmueble.more', 'uses' => 'WebController@more']);
Route::get('/inmueble', ['as' => 'general.inmueble', 'uses' => 'WebController@inmueble']);
Route::get('/inmueble/{slug}', ['as' => 'inmueble.detail', 'uses' => 'WebController@inmueble']);

Route::post('publicar/crear', ['as' => 'publicar.create', 'uses' => 'WebController@publicaCreate']);
Route::post('publicar', ['as' => 'publicar.store', 'uses' => 'WebController@publicaStore']);
Route::get('publicar/{id}', ['as' => 'publicar.edit', 'uses' => 'WebController@publicaEdit']);
Route::put('publicar/{id}', ['as' => 'publicar.update', 'uses' => 'WebController@publicaUpdate']);

Route::get('publicar', ['as' => 'publicar.seleccion', 'uses' => 'WebController@publicaSeleccionar']);


Route::get('/mis-publicaciones', ['as' => 'mispublicaciones', 'uses' => 'WebControllerIntranet@index']);
Route::delete('/mis-publicaciones/{id}', ['as' => 'mi-inmueble.delete', 'uses' => 'WebControllerIntranet@destroy']);


Route::get('inmueble_fotos/{id}', ['as' => 'publicInmuebleFotos.index', 'uses' => 'WebInmuebleController@index']);
Route::get('inmueble_fotos_crear/{id}', ['as' => 'publicInmuebleFotos.create', 'uses' => 'WebInmuebleController@create']);
Route::post('inmueble_fotos', ['as' => 'publicInmuebleFotos.store', 'uses' => 'WebInmuebleController@store']);
Route::get('inmueble_fotos_edit/{id}', ['as' => 'publicInmuebleFotos.edit', 'uses' => 'WebInmuebleController@edit']);
Route::put('inmueble_fotos/{id}', ['as' => 'publicInmuebleFotos.update', 'uses' => 'WebInmuebleController@update']);
Route::delete('inmueble_fotos/{id}', ['as' => 'publicInmuebleFotos.delete', 'uses' => 'WebInmuebleController@destroy']);
Route::delete('inmueble_fotos_reordenar', ['as' => 'publicInmuebleFotos.reordenar', 'uses' => 'WebInmuebleController@reordenar']);

Route::post('mensajes', ['as' => 'mensaje.post', 'uses' => 'WebControllerMensajes@post']);

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
Route::delete('atributo_reordenar/{id}', ['as' => 'atributo.reordenar', 'uses' => 'AtributoController@reordenar']);

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

Route::delete('inmuebles_publicar/{id}', ['as' => 'inmueble.publicar', 'uses' => 'InmuebleController@publicar']);
Route::delete('inmuebles_despublicar/{id}', ['as' => 'inmueble.despublicar', 'uses' => 'InmuebleController@despublicar']);

Route::get('inmuebles_fotos/{id}', ['as' => 'inmuebleFotos.index', 'uses' => 'InmuebleFotosController@index']);
Route::get('inmuebles_fotos_crear/{id}', ['as' => 'inmuebleFotos.create', 'uses' => 'InmuebleFotosController@create']);
Route::post('inmuebles_fotos', ['as' => 'inmuebleFotos.store', 'uses' => 'InmuebleFotosController@store']);
Route::get('inmueble_foto_edit/{id}', ['as' => 'inmuebleFotos.edit', 'uses' => 'InmuebleFotosController@edit']);
Route::put('inmuebles_fotos/{id}', ['as' => 'inmuebleFotos.update', 'uses' => 'InmuebleFotosController@update']);
Route::delete('inmuebles_fotos/{id}', ['as' => 'inmuebleFotos.delete', 'uses' => 'InmuebleFotosController@destroy']);
Route::delete('inmuebles_fotos_reordenar', ['as' => 'inmuebleFotos.reordenar', 'uses' => 'InmuebleFotosController@reordenar']);



Route::get('usuarios', ['as' => 'usuario.index', 'uses' => 'UsuarioController@index']);
Route::get('usuarios/crear', ['as' => 'usuario.create', 'uses' => 'UsuarioController@create']);
Route::post('usuarios', ['as' => 'usuario.store', 'uses' => 'UsuarioController@store']);
Route::get('usuarios/{id}', ['as' => 'usuario.edit', 'uses' => 'UsuarioController@edit']);
Route::put('usuarios/{id}', ['as' => 'usuario.update', 'uses' => 'UsuarioController@update']);
Route::delete('usuarios/{id}', ['as' => 'usuario.delete', 'uses' => 'UsuarioController@destroy']);

Route::get('ingresar', ['as' => 'vivela.login', 'uses' => 'LoginController@login']);
Route::get('iniciar_sesion_facebook', ['as' => 'facebook.registro', 'uses' => 'LoginController@face_registro']);
Route::get('iniciar_sesion', ['as' => 'facebook.iniciarSesion', 'uses' => 'LoginController@iniciarSesion']);
Route::get('facebook_callback', ['as' => 'facebook.fbCallback', 'uses' => 'LoginController@fbCallback']);
Route::get('facebook_callback_registro', ['as' => 'facebook.fbCallbackRegisto', 'uses' => 'LoginController@fbCallback_registro']);
Route::get('registro', ['as' => 'usuario.registro', 'uses' => 'LoginController@registro']);
Route::post('registro', ['as' => 'usuario.registrostore', 'uses' => 'LoginController@registroStore']);
Route::post('ingresar_login', ['as' => 'usuario.login', 'uses' => 'LoginController@ingresarLogin']);
Route::get('verificacion/{codigos}', ['as' => 'usuario.verificacion', 'uses' => 'LoginController@verificacion']);



Auth::routes();

Route::get('data', function(){
    $targetFolder = base_path().'/storage/app/public'; 
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; 
    symlink($targetFolder, $linkFolder); 
});


Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::post('/postear', 'WebControllerMensajes@sendMessage');

Route::get('/red', function(){
    return redirect('/')->with('success', 'Optiona Title');
});

Route::get('/enviar', 'MensajesController@create');

