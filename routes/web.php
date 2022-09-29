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
/*
Route::get('/', function () {
    return view('welcome');
})->name('main');
*/

Route::get('/', 'MainController@index')->name('main');

Route::get('productos', 'ProductController@index')->name('productos.index');

Route::get('productos/crear', 'ProductController@crear')->name('productos.crear');

Route::post('productos', 'ProductController@tienda')->name('productos.tienda');

Route::get('productos/{producto}', 'ProductController@mostrar')->name('productos.mostrar');

Route::get('productos/{producto}/editar', 'ProductController@editar')->name('productos.editar');

Route::match(['put', 'patch'],'productos/{producto}', 'ProductController@actualizar')->name('productos.actualizar');

Route::delete('productos/{producto}', 'ProductController@eliminar')->name('productos.eliminar');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
