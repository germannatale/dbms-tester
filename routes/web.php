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

Route::group(['middleware' => ['get.menu']], function () {
    // Inicio
    Route::get('/', function () {           return view('dashboard.home'); });
    Route::get('/charts', function () {     return view('dashboard.charts'); });

    // Test
    Route::prefix('test')->group(function () {
        Route::any('/insert','TestController@insert')->name('test.insert');
        Route::any('/select','TestController@select')->name('test.select');
        Route::any('/update','TestController@update')->name('test.update');        
        Route::any('/blob','TestController@blob')->name('test.blob');
        Route::any('/delete','TestController@delete')->name('test.delete');
    }); 
    
    // Estadisticas
    Route::prefix('estadisticas')->group(function () {
        Route::get('/vs/promedio', 'EstadisticaController@promedio')->name('estadisticas.promedio');
        Route::get('/vs/curvas', 'EstadisticaController@curvas')->name('estadisticas.curvas');
        Route::get('/motor/{motor}', 'EstadisticaController@motor')->name('estadisticas.motor');
        Route::get('/resultados', 'EstadisticaController@resultados')->name('estadisticas.resultados');
        Route::get('/restaurar','EstadisticaController@restaurar')->name('estadisticas.restaurar');
        Route::any('/destroy','EstadisticaController@destroy')->name('estadisticas.destroy');
    });
    
});