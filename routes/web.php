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

/*Route::get('/', function () {
    return view('home');
});*/


Route::get('/encuesta', function () {
    return view('encuesta');
});

Route::get('seguimiento', [
    'uses' => 'admin\vinculacion\seguimiento\SeguimientoController@index',
    'as'   => 'seguimiento.index',
]);

Route::get('students/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\StudentController@index',
    'as'   => 'students.index',
]);

Route::get('surveys/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyController@index',
    'as'   => 'surveys.index',
]);

Route::get('statistics/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\StatisticController@index',
    'as'   => 'statistics.index',
]);


//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/nuevo', 'UserController@create')->name('users.create');
Route::post('/guardar', 'UserController@store')->name('users.store');
Route::get('/editar/{id}', 'UserController@edit')->name('users.edit');
Route::put('/editar/{id}', 'UserController@update')->name('users.update');

Route::get('/correo', 'EmailController@envio');

