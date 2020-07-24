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
Route::post('/survey_store', 'admin\vinculacion\seguimiento\SurveyController@store')->name('surveys.store');
Route::get('survey_edit/{survey}', 'admin\vinculacion\seguimiento\SurveyController@edit')->name('surveys.edit');
Route::put('/survey_edit/{id}', 'admin\vinculacion\seguimiento\SurveyController@update')->name('surveys.update');
Route::get('survey_duplicate/{period}', 'admin\vinculacion\seguimiento\SurveyController@duplicate')->name('surveys.duplicate');
Route::delete('/survey_delete/{id}', 'admin\vinculacion\seguimiento\SurveyController@destroy')->name('surveys.destroy');
Route::post('/survey_duplicate', 'admin\vinculacion\seguimiento\SurveyController@post_duplicate')->name('surveys.post_duplicate');
Route::get('/apply_survey/{survey}', 'admin\vinculacion\seguimiento\SurveyController@apply_survey')->name('surveys.apply');




Route::get('dropdown', function(){
    $id = \Illuminate\Support\Facades\Input::get('option');
    $surveys = \App\admin\vinculacion\seguimiento\Survey::where('period_id',$id)->get();
    return $surveys->pluck('displayName', 'id');
});


Route::get('questions_new/{survey}', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyQuestionController@create',
    'as'   => 'questions.create',
]);

Route::post('/question_new', 'admin\vinculacion\seguimiento\SurveyQuestionController@store')->name('questions.store');
//Route::post('/question_edit', 'admin\vinculacion\seguimiento\SurveyQuestionController@store')->name('questions.store');


Route::get('question_edit/{question}', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyQuestionController@edit',
    'as'   => 'questions.edit',
]);
Route::put('/question_update/{question}', 'admin\vinculacion\seguimiento\SurveyQuestionController@update')->name('questions.update');
Route::delete('/question_delete/{id}', 'admin\vinculacion\seguimiento\SurveyQuestionController@destroy')->name('questions.destroy');
Route::post('/question_duplicate/{id}', 'admin\vinculacion\seguimiento\SurveyQuestionController@duplicate')->name('questions.duplicate');

Route::post('/option_new', 'admin\vinculacion\seguimiento\QuestionOptionController@store')->name('options.store');
Route::delete('/option_delete/{id}', 'admin\vinculacion\seguimiento\QuestionOptionController@destroy')->name('options.destroy');
Route::get('/option/{id}/editModal', 'admin\vinculacion\seguimiento\QuestionOptionController@editModal')->name('options.editModal');


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

Route::get('/enterprise', 'admin\vinculacion\seguimiento\EnterpriseController@index')->name('enterprise.index');
Route::get('/enterprise/new', 'admin\vinculacion\seguimiento\EnterpriseController@create')->name('enterprise.create');
Route::post('/enterprise/save', 'admin\vinculacion\seguimiento\EnterpriseController@store')->name('enterprise.store');
Route::get('/enterprise/edit/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@edit')->name('enterprise.edit');
Route::put('/enterprise/edit/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@update')->name('enterprise.update');
Route::delete('/enterprise/delete/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@destroy')->name('enterprise.destroy');

Route::get('/shift', 'admin\vinculacion\seguimiento\ShiftController@index')->name('shift.index');

Route::get('/importar', 'admin\vinculacion\seguimiento\ImportarAlumnoController@create')->name('imports.create');
Route::post('/importar/save', 'admin\vinculacion\seguimiento\ImportarAlumnoController@store')->name('imports.store');
