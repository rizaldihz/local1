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

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::resource('production','ProductionController');
Route::resource('home','HomeController');

Route::get('/create', 'ProductionController@create');
Route::get('/{production}/export_view', 'ProductionController@export_view')->name('production.export_view');
Route::get('/{production}/export', 'ProductionController@export')->name('production.export');
Route::get('/{production}/chart', 'ProductionController@chart')->name('production.chart');
Route::get('/reset','ProductionController@showresetPass');
Route::post('/resetPass','ProductionController@resetPass');
Route::post('/','HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::post('chart','ProductionController@chartData');
