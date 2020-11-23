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


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});
//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/prueba', function() {
    $exitCode = Artisan::call('enviar:mail');
    return '<h1>Enviado</h1>';
});


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/empleados', 'EmpleadosController');
Route::resource('dashboard', 'DashboardController');
Route::resource('/encuesta', 'EncuestaController');
Route::get('/tipotrabajo', 'EncuestaController@tipotrabajo')->name('tipotrabajo');

Route::get('encuestas/export/', 'excelController@encuestas');
Route::get('terceros/export/', 'excelController@terceros');
Route::get('trabajadores/export/', 'excelController@empleados');
Route::get('consintomas/export/', 'excelController@consintomas');
Route::get('sinsintomas/export/', 'excelController@sinsintomas');
Route::get('factoresriesgos/export/', 'excelController@factoresriesgos');
Route::get('concovid/export/', 'excelController@concovid');
Route::get('faltanReportar/export/', 'excelController@faltanReportar');
Route::get('consultaencuesta/export/', 'excelController@consultaencuesta')->name('consultaencuesta');
Route::get('faltanReportarfecha/export/', 'excelController@faltanReportarfecha')->name('faltanReportarfecha');
Route::get('sinsintomasfecha/export/', 'excelController@sinsintomasFecha')->name('sinsintomasFecha');
Route::get('concovidFecha/export/', 'excelController@concovidFecha')->name('concovidFecha');
Route::get('consintomasFecha/export/', 'excelController@consintomasFecha')->name('consintomasFecha');
Route::get('factoresriesgosFecha/export/', 'excelController@factoresriesgosFecha')->name('factoresriesgosFecha');