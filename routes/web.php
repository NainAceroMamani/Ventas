<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/puesto/create', 'Cliente\PuestoController@create');
    Route::post('/puesto/store', 'Cliente\PuestoController@store');
    
    // Api REST de Subcategorias
    Route::get('/categorias/{categoria}/subcategorias', 'Cliente\CategoriaController@apiSubcategoria');
    // Api REST de Grupos
    Route::get('/grupos/{id}/subcategorias', 'Cliente\ProductoController@apiSubcategoriaGrupo');
    // Api REST Producto
    Route::get('/producto/{producto}/getProducto', 'Cliente\ProductoController@getProducto');

    // Productos Cliente
    Route::get('/producto/{usuarioPuesto}/lista', 'Cliente\ProductoController@index');
    Route::get('/producto/create', 'Cliente\ProductoController@puestos');
    Route::get('/producto/{usuarioPuesto}/add', 'Cliente\ProductoController@create');
    Route::post('/producto/store', 'Cliente\ProductoController@store');
    Route::get('/productos/{grupo}/all/{usuarioPuesto}', 'Cliente\ProductoController@productos');
    Route::get('/producto/{usuarioPuesto}/editar/{producto}' , 'Cliente\ProductoController@editar');
    Route::put('/producto/update/{producto}', 'Cliente\ProductoController@update');

    // Subida de Imagenes
    Route::post('/producto/dropzoneFrom', 'Cliente\ProductoController@dropzoneFrom');
    Route::post('/producto/dropzonedelete', 'Cliente\ProductoController@dropzonedelete');

    // Grupos de Cliente
    Route::get('/producto/{usuarioPuesto}/grupo', 'Cliente\ProductoController@create_grupo');
    Route::post('/producto/grupo', 'Cliente\ProductoController@grupo');

    // Categorias
    Route::get('/categoria', 'Administrador\CategoriaController@index');
    Route::get('/categoria/create', 'Administrador\CategoriaController@create');
    Route::post('/categoria/store', 'Administrador\CategoriaController@store');
    Route::get('/categoria/{categoria}/edit', 'Administrador\CategoriaController@edit');
    Route::put('/categoria/{categoria}/update', 'Administrador\CategoriaController@update');

    // Subcategorias
    Route::get('/subcategoria', 'Administrador\SubCategoriaController@index');
    Route::get('/subcategoria/create', 'Administrador\SubCategoriaController@create');
    Route::post('/subcategoria/store', 'Administrador\SubCategoriaController@store');
    Route::get('/subcategoria/{subcategoria}/edit', 'Administrador\SubCategoriaController@edit');
    Route::put('/subcategoria/{subcategoria}/update', 'Administrador\SubCategoriaController@update');

    // Paises
    Route::get('/pais', 'Administrador\PaisController@index');
    Route::get('/pais/create', 'Administrador\PaisController@create');
    Route::post('/pais/store', 'Administrador\PaisController@store');
    Route::get('/pais/{pais}/edit', 'Administrador\PaisController@edit');
    Route::put('/pais/{pais}/update', 'Administrador\PaisController@update');

    // Regiones
    Route::get('/region', 'Administrador\RegionController@index');
    Route::get('/region/create', 'Administrador\RegionController@create');
    Route::post('/region/store', 'Administrador\RegionController@store');
    Route::get('/region/{region}/edit', 'Administrador\RegionController@edit');
    Route::put('/region/{region}/update', 'Administrador\RegionController@update');    
    // Api REST de Regiones
    Route::get('/region/{pais}/regiones', 'Administrador\RegionController@apiregiones');

    // Provincias 
    Route::get('/provincia', 'Administrador\ProvinciaController@index');
    Route::get('/provincia/create', 'Administrador\ProvinciaController@create');
    Route::post('/provincia/store', 'Administrador\ProvinciaController@store');
    Route::get('/provincia/{provincia}/edit', 'Administrador\ProvinciaController@edit');
    Route::put('/provincia/{provincia}/update', 'Administrador\ProvinciaController@update');

    // Suscripciones
    Route::get('/price', 'Cliente\PrecioController@index');
});
