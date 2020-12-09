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
        //Resumen de ventas del panel del usuario
        Route::get('ventas/resumen/{id}', 'VentaController@resumen')->name('ventas.resumen');
        //Publicaciones
        Route::get('ventas/{id}', 'VentaController@show')->name('ventas.show');
        //Ventas realizadas
        Route::get('ventas/ventas/{id}', 'VentaController@ventas')->name('ventas.ventas');
        //Detalle ventas realizadas
        Route::get('ventas/ventas-detalle/{venta}', 'VentaController@detalle')->name('ventas.detalle');
    
    //Comprar
        Route::get('compras/{id}', 'CompraController@show')->name('compras.show');
        Route::get('compra/calificar/{producto}', 'CompraController@calificar')->name('compras.calificar');
        //Al momento de comprar el producto
        Route::get('comprar/', 'TransaccionController@confirmaMetodos')->name('compras.confirma-metodos');
        Route::get('comprar/revisar-y-confirmar', 'TransaccionController@revisaMetodos')->name('compras.revisa-confirma');
        Route::post('comprar/comprado', 'TransaccionController@store')->name('compras.store');

    //Opiniones
        Route::post('opinion/store', 'OpinionController@store')->name('opinion.store');

    //Preguntas
        Route::get('preguntas/{id}', 'PreguntaController@show')->name('preguntas.show');
        Route::delete('preguntas/{id}', 'PreguntaController@destroy')->name('preguntas.eliminar');
        Route::get('preguntas/responder/{id}', 'PreguntaController@responder')->name('preguntas.responder');

    //Favoritos
        Route::get('favoritos/{id}', 'FavoritoController@show')->name('favoritos.show');

    //Users
        Route::get('users/datos/{user}', 'UserController@datos')->name('users.datos');
        Route::get('users/seguridad/{user}', 'UserController@seguridad')->name('users.seguridad');

        Route::get('users/edit/email/{user}', 'UserController@editEmail')->name('users.email');
        Route::put('users/edit/email/', 'UserController@updateEmail')->name('users.update.email');

        Route::get('users/edit/clave/{user}', 'UserController@editClave')->name('users.clave');
        Route::put('users/edit/clave/', 'UserController@updateClave')->name('users.update.clave');

        Route::get('users/edit/name/{user}', 'UserController@editName')->name('users.name');
        Route::put('users/edit/name/', 'UserController@updateName')->name('users.update.name');

        Route::get('users/edit/cedula/{user}', 'UserController@editCedula')->name('users.cedula');
        Route::put('users/edit/cedula/', 'UserController@updateCedula')->name('users.update.cedula');

        Route::get('users/edit/telefono/{user}', 'UserController@editTelefono')->name('users.telefono');
        Route::put('users/edit/telefono/', 'UserController@updateTelefono')->name('users.update.telefono');

        Route::get('users/edit/direccion/{user}', 'UserController@editDireccion')->name('users.direccion');
        Route::put('users/edit/direccion/', 'UserController@updateDireccion')->name('users.update.direccion');

});