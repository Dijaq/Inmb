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
Route::get('/inmueble', ['as' => 'general.inmueble', 'uses' => 'WebController@inmueble']);