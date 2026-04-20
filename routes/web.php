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

Auth::routes();
// Page's routes
Route::get('/', 'MainController@index');
Route::get('/contactanos', 'PageController@contact');
Route::get('/quienes-somos', 'PageController@about');


Route::get('/canchas', 'CanchaController@index');
Route::get('/canchas/show/{idcancha}', 'CanchaController@show');

Route::get('/eventos', 'EventoController@index');
Route::get('/eventos/eventos/{fecha}', 'EventoController@eventosxfecha');

Route::get('/productos', 'ProductoController@index');
Route::get('/productos/buscar/{nombre}', 'ProductoController@seachByName');
Route::get('/productos/tipos', 'ProductoController@tipos');


Route::get('/carrito', 'CartController@index');
Route::post('/carrito/agregar', 'CartController@agregarProducto');
Route::post('/carrito/eliminar', 'CartController@eliminarProducto');
Route::post('/carrito/count', 'CartController@countProducto');

Route::get('/reservas/reservas/{fecha}', 'ReservaController@reservasxfecha');


Route::middleware(['auth'])->group(function () {
    Route::post('/eventos/reservar/cliente', 'EventoController@reservarCliente');
    Route::post('/venta/vender/cliente', 'VentaController@venderCliente');
    Route::post('/reservas/reservar/cliente', 'ReservaController@reservaCliente');
    
    // Profile's routes
    Route::get('/perfil/reservas', 'PerfilController@reservas');
    Route::get('/perfil/compras', 'PerfilController@compras');
    Route::get('/perfil/eventos', 'PerfilController@eventos');

    //Empleado's routes
    Route::get('/perfil/juego', 'ReservaController@juegoFecha');
    Route::get('/perfil/nueva/venta', 'VentaController@index');
    Route::get('/perfil/nueva/reserva', 'ReservaController@index');
    Route::get('/perfil/buscar/producto/{nombre}', 'VentaController@buscarProducto');
    Route::post('/perfil/reserva/update/estado', 'ReservaController@cambiarEstado');

    Route::post('/venta/vender/empleado', 'VentaController@venderEmpleado');
    Route::post('/eventos/reservar/empleado', 'EventoController@reservarEmpleado');
    Route::post('/reservas/reservar/empleado', 'ReservaController@reservaEmpleado');

    // Reportes
    Route::get('/reporte', 'ReporteController@index');
    Route::post('/reporte/buscar', 'ReporteController@buscar');
});