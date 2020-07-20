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

Route::get('survey_new/{period}', 'admin\vinculacion\seguimiento\SurveyController@create')->name('surveys.create');
Route::get('survey_edit/{survey}', 'admin\vinculacion\seguimiento\SurveyController@edit')->name('surveys.edit');


Route::get('questions_new/{survey}', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyQuestionController@create',
    'as'   => 'questions.create',
]);

Route::get('questions_edit/{question}', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyQuestionController@edit',
    'as'   => 'questions.edit',
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

Route::get('/kinships', 'admin\vinculacion\seguimiento\KinshipController@index')->name('kinships.index');
Route::get('/new_kinship', 'admin\vinculacion\seguimiento\KinshipController@create')->name('kinships.create');
Route::post('/guardar_kinship', 'admin\vinculacion\seguimiento\KinshipController@store')->name('kinships.store');
Route::get('/edit_kinship/{id}', 'admin\vinculacion\seguimiento\KinshipController@edit')->name('kinships.edit');
Route::put('/edit_kinship/{id}', 'admin\vinculacion\seguimiento\KinshipController@update')->name('kinships.update');
Route::delete('/delete_kinship/{id}', 'admin\vinculacion\seguimiento\KinshipController@destroy')->name('kinships.destroy');

Route::get('/correo', 'EmailController@envio');

