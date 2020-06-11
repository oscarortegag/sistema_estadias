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

Route::get('/', function () {
    return view('home');
});


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

Route::get('polls/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\PollController@index',
    'as'   => 'polls.index',
]);

Route::get('statistics/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\StatisticController@index',
    'as'   => 'statistics.index',
]);



