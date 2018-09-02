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

/*
Route::get('/', function () {
    return view('home');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/recepcion', 'RecepcionController@index')->name('recepcion');
Route::get('/recepcion/monturas', 'RecepcionController@monturas')->name('recepcion.monturas');
Route::get('/recepcion/pedidos', 'RecepcionController@pedidos')->name('recepcion.pedidos');
Route::post('/pedidos/recibido/{id}', 'PedidosController@recibido');


/*
Route::get('/almacen', function () {
    return view('almacen.index');
});
*/
Route::resource('suppliers', 'SuppliersController');
Route::resource('products', 'ProductsController');
Route::resource('warehouses', 'WarehousesController');
Route::resource('clients', 'ClientsController');
