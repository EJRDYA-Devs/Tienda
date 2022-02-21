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
//Reporte de Todos los Productos
Route::get('/ReporteProductos','App\Http\Controllers\TransaccionesController@ReporteProductos');

//Reporte de Todas las transacciones
Route::get('/ReporteTransacciones','App\Http\Controllers\TransaccionesController@ReporteTransacciones');


//llama formulario  en Controller para Ingresar Transaccion
Route::get('/newTransaccion/create','App\Http\Controllers\TransaccionesController@create',function()  
{  
    //  
}) -> name('Create_transaccion');

//LLama metodo post en TransaccionesController
Route::post('/newTransaccion','App\Http\Controllers\TransaccionesController@store'); 

//llama formulario para escoger la transaccion a eliminar
Route::get('/transaccion/delete','App\Http\Controllers\TransaccionesController@Eliminar'); 
//Elimina Transaccion
Route::get('/transaccionEliminada/{id}','App\Http\Controllers\TransaccionesController@Destroy'); //Elimina
