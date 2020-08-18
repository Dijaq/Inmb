<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get("atributos", "AtributoController@index");
Route::post("atributos", "AtributoController@store");
Route::get("atributos/{id}", "AtributoController@show");
Route::put("atributos/{id}", "AtributoController@update");
Route::delete("atributos/{id}", "AtributoController@destroy");

Route::get("inmuebles", "InmuebleController@index");
Route::post("inmuebles", "InmuebleController@store");
Route::get("inmuebles/{id}", "InmuebleController@show");
Route::put("inmuebles/{id}", "InmuebleController@update");
Route::delete("inmuebles/{id}", "InmuebleController@destroy");

Route::get("operacion", "OperacionController@index");
Route::post("operacion", "OperacionController@store");
Route::get("operacion/{id}", "OperacionController@show");
Route::put("operacion/{id}", "OperacionController@update");
Route::delete("operacion/{id}", "OperacionController@destroy");

Route::get("personas", "PersonaController@index");
Route::post("personas", "PersonaController@store");
Route::get("personas/{id}", "PersonaController@show");
Route::put("personas/{id}", "PersonaController@update");
Route::delete("personas/{id}", "PersonaController@destroy");

Route::get("usuarios", "UsuarioController@index");
Route::post("usuarios", "UsuarioController@store");
Route::get("usuarios/{id}", "UsuarioController@show");
Route::put("usuarios/{id}", "UsuarioController@update");
Route::delete("usuarios/{id}", "UsuarioController@destroy");

Route::get("servicios", "ServicioController@index");
Route::post("servicios", "ServicioController@store");
Route::get("servicios/{id}", "ServicioController@show");
Route::put("servicios/{id}", "ServicioController@update");
Route::delete("servicios/{id}", "ServicioController@destroy");

Route::get("tipos", "TipoController@index");
Route::post("tipos", "TipoController@store");
Route::get("tipos/{id}", "TipoController@show");
Route::put("tipos/{id}", "TipoController@update");
Route::delete("tipos/{id}", "TipoController@destroy");

Route::get("mensajes", "MensajesController@index");
Route::post("mensajes", "MensajesController@store");
Route::get("mensajes/{id}", "MensajesController@show");
Route::put("mensajes/{id}", "MensajesController@update");
Route::delete("mensajes/{id}", "MensajesController@destroy");

