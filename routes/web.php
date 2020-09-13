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

route::post('search', 'HomeController@search')->name('search-categories');

Route::get('productos/{producto}', 'ProductoController@show')->name('productos.show');

Auth::routes();

Route::middleware(['auth'])->group(function(){

});