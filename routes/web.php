<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('home');

route::get('search', 'HomeController@search')->name('search');

route::get('search-categorie', 'HomeController@searchCategorie')->name('search-categorie');

/*route::get('filter', 'HomeController@filter')->name('filter');*/

Route::get('productos/{producto}', 'ProductoController@show')->name('productos.show');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    //Vender
        //Crear la venta y agregarle imagenes
        Route::get('vender', 'VentaController@create')->name('ventas.create');
        Route::get('vender/{producto}/edit', 'VentaController@edit')->name('ventas.edit');
        Route::get('vender/images/{producto}', 'VentaController@images')->name('ventas.images');
        //Guardar el form de ventas y de imagenes
        Route::post('vender', 'VentaController@store')->name('ventas.store');
        Route::post('vender/images/', 'VentaController@storeImages')->name('ventas.storeImages');
        //Si se cancela la venta cuando se esta subiendo las imagenes
        Route::post('vender/deshabilitado/', 'VentaController@deshabilitarVenta')->name('ventas.deshabilitar');
    
    //Comprar
        //Al momento de comprar el producto
        Route::get('compras/{id}', 'CompraController@show')->name('compras.show');
        Route::get('comprar/', 'TransaccionController@confirmaMetodos')->name('compras.confirma-metodos');
        Route::get('comprar/revisar-y-confirmar', 'TransaccionController@revisaMetodos')->name('compras.revisa-confirma');
        Route::post('comprar/comprado', 'TransaccionController@store')->name('compras.store');
        Route::get('compra/calificar/{producto}', 'CompraController@calificar')->name('compras.calificar');

    //Opiniones
        Route::post('opinion/store', 'OpinionController@store')->name('opinion.store');

});