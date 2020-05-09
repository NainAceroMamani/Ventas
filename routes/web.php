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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Rutas de Cliente => Perfil de Usuario
    Route::get('/user', 'Cliente\UserController@edit');
    Route::put('/user/update/{usuario}', 'Cliente\UserController@update');

    // Rutas de Cliente => Puesto
    Route::get('/puesto', 'Cliente\PuestoController@index');
    Route::get('/puesto/{puesto}/edit', 'Cliente\PuestoController@edit');
    Route::put('/puesto/update/{puesto}', 'Cliente\PuestoController@update');
    
    // Api REST de subcategorias
    Route::get('/categorias/{categoria}/subcategorias', 'Cliente\CategoriaController@apiSubcategoria');

    // Productos Cliente
    Route::get('/producto', 'Cliente\ProductoController@index');
    
});
