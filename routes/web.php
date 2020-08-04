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
Route::post('/apply_survey/{survey}', 'admin\vinculacion\seguimiento\SurveyController@apply_survey_post')->name('surveys.post_apply');
Route::get('/survey_activate/{id}', 'admin\vinculacion\seguimiento\SurveyController@activate')->name('surveys.activate');
Route::get('/survey_deactivate/{id}', 'admin\vinculacion\seguimiento\SurveyController@deactivate')->name('surveys.deactivate');


Route::get('/answer_survey', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyStudentController@index',
    'as'   => 'answer_survey.index',
]);

Route::get('/answer_survey/{apply_survey}', 'admin\vinculacion\seguimiento\SurveyStudentController@answer_survey')->name('surveys.answer');
Route::post('/answer_survey/{apply_survey}', 'admin\vinculacion\seguimiento\SurveyStudentController@answer_survey_post')->name('surveys.post_answer');




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


Route::get('questions_edit/{question}', [
    'uses' => 'admin\vinculacion\seguimiento\SurveyQuestionController@edit',
    'as'   => 'questions.edit',
]);
Route::put('/question_update/{question}', 'admin\vinculacion\seguimiento\SurveyQuestionController@update')->name('questions.update');
Route::delete('/question_delete/{id}', 'admin\vinculacion\seguimiento\SurveyQuestionController@destroy')->name('questions.destroy');
Route::post('/question_duplicate/{id}', 'admin\vinculacion\seguimiento\SurveyQuestionController@duplicate')->name('questions.duplicate');

Route::post('/option_new', 'admin\vinculacion\seguimiento\QuestionOptionController@store')->name('options.store');
Route::delete('/option_delete/{id}', 'admin\vinculacion\seguimiento\QuestionOptionController@destroy')->name('options.destroy');
Route::get('/option/{id}/editModal', 'admin\vinculacion\seguimiento\QuestionOptionController@editModal')->name('options.editModal');
Route::put('/edit_option/{id}', 'admin\vinculacion\seguimiento\QuestionOptionController@update')->name('options.update');


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

Route::get('/studentcontact','admin\vinculacion\seguimiento\StudentContactController@index')->name('studentcontact.index');
Route::get('/studentcontact/edit/{id}','admin\vinculacion\seguimiento\StudentContactController@edit')->name('studentcontact.edit');
Route::put('/studentcontact/edit/{id}','admin\vinculacion\seguimiento\StudentContactController@update')->name('studentcontact.update');

Route::get('/advisor','admin\vinculacion\seguimiento\AcademicAdvisorController@index')->name('advisors.index');
Route::get('/advisor/new','admin\vinculacion\seguimiento\AcademicAdvisorController@create')->name('advisors.create');
Route::post('/advisor/save','admin\vinculacion\seguimiento\AcademicAdvisorController@store')->name('advisors.store');
Route::get('/advisor/edit/{id}','admin\vinculacion\seguimiento\AcademicAdvisorController@edit')->name('advisors.edit');
Route::put('/advisor/edit/{id}','admin\vinculacion\seguimiento\AcademicAdvisorController@update')->name('advisors.update');
Route::delete('/advisor/delete/{id}', 'admin\vinculacion\seguimiento\AcademicAdvisorController@destroy')->name('advisors.destroy');

Route::get('/editore','admin\vinculacion\seguimiento\EditorStyleController@index')->name('editors.index');
Route::get('/editore/new','admin\vinculacion\seguimiento\EditorStyleController@create')->name('editors.create');
Route::post('/editore/save','admin\vinculacion\seguimiento\EditorStyleController@store')->name('editors.store');
Route::get('/editore/edit/{id}','admin\vinculacion\seguimiento\EditorStyleController@edit')->name('editors.edit');
Route::put('/editore/edit/{id}','admin\vinculacion\seguimiento\EditorStyleController@update')->name('editors.update');
Route::delete('/editore/delete/{id}', 'admin\vinculacion\seguimiento\EditorStyleController@destroy')->name('editors.destroy');

Route::get('/linking','admin\vinculacion\seguimiento\LinkingController@index')->name('linkings.index');
Route::get('/linking/new','admin\vinculacion\seguimiento\LinkingController@create')->name('linkings.create');
Route::post('/linking/save','admin\vinculacion\seguimiento\LinkingController@store')->name('linkings.store');
Route::get('/linking/edit/{id}','admin\vinculacion\seguimiento\LinkingController@edit')->name('linkings.edit');
Route::put('/linking/edit/{id}','admin\vinculacion\seguimiento\LinkingController@update')->name('linkings.update');
Route::delete('/linking/delete/{id}', 'admin\vinculacion\seguimiento\LinkingController@destroy')->name('linkings.destroy');

Route::get('/index/{doc}','admin\vinculacion\seguimiento\WordController@index')->name('word.index');

Route::get('/presenta','admin\vinculacion\seguimiento\PresentationController@index')->name('presentation.index');
Route::get('/excel','admin\vinculacion\seguimiento\ExcelController@index')->name('excel.index');

Route::get('/importerCompany', 'admin\vinculacion\seguimiento\ImporterEnterpriseController@create')->name('importscompany.create');
Route::post('/importerCompany/save', 'admin\vinculacion\seguimiento\ImporterEnterpriseController@store')->name('importscompany.store');
Route::get('/importerCompany/show/{id}', 'admin\vinculacion\seguimiento\ImporterEnterpriseController@show')->name('importscompany.show');
