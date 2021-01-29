<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\TemplatePermisos\Models\Role;
use App\TemplatePermisos\Models\Permission;
use Illuminate\Support\Facades\Gate;
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
Route::get('/admin', 'HomeController@admin')->name('admin');


Route::get('/test', function () {
    $user = User::find(2);
//    $user->roles()->sync([3]);
    Gate::authorize('haveaccess','role.show');
    return $user;

//    return $user->havePermission('role.index');
});

Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController',['except'=>[
    'create','store']])->names('user');







//Ruta de prueba de componentes
Route::get('/testReportes', 'HomeController@testReportes')->name('testReportes');

Route::get('/testExcel', function () {
    return view('pruebaComponentes\importarExcel');
});

/*

RUTAS DE ENTREGAS
*/

//Subir entregas POST
Route::post('/import-list-excel', 'EntregaController@subirEntregas')->name('subirEntregas');
Route::resource('/entrega', 'EntregaController')->names('entrega');
Route::get('/entregas-hoy', 'EntregaController@entregasHoy')->name('entregasHoy');

//Mostrar entregas pendientes por patente
Route::get('/entregas-patente', 'EntregaController@entregasPatente')->name('entregasPatente');
Route::get('/entrega-proceso/{entrega}', 'EntregaController@entregaProceso')->name('entregaProceso');
Route::post('/entrega-exitosa', 'EntregaController@entregaExitosa')->name('entregaExitosa');


Route::resource('/producto-entregado', 'productoEntregadoController')->names('productoEntregado');
