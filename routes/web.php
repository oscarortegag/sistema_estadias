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

Route::get('/generaExcel/{survey}', 'ExcelController@generaExcel')->name('generarExcel');

Route::get('seguimiento', [
    'uses' => 'admin\vinculacion\seguimiento\SeguimientoController@index',
    'as'   => 'seguimiento.index',
]);

Route::get('students/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\StudentController@index',
    'as'   => 'students.index',
]);
Route::get('students/edit/{id}', [
    'uses' => 'admin\vinculacion\seguimiento\StudentController@edit',
    'as'   => 'students.edit',
]);

Route::put('students/edit/{id}', [
    'uses' => 'admin\vinculacion\seguimiento\StudentController@update',
    'as'   => 'students.update',
]);

Route::delete('students/delete/{id}', [
    'uses' => 'admin\vinculacion\seguimiento\StudentController@destroy',
    'as'   => 'students.destroy',
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

Route::get('statistics/studentByEducativeProgram/{period}', [
    'uses' => 'admin\vinculacion\seguimiento\StatisticController@alumnosPorCarrera',
    'as'   => 'statistics.studentByEducativeProgram',
]);


//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController')->except(['show','destroy']);
Route::resource('kinships', 'admin\vinculacion\seguimiento\KinshipController')->except(['show']);
Route::resource('states', 'admin\vinculacion\seguimiento\StateController')->except(['show']);


Route::get('/enterprise', 'admin\vinculacion\seguimiento\EnterpriseController@index')->name('enterprise.index');
Route::get('/enterprise/new', 'admin\vinculacion\seguimiento\EnterpriseController@create')->name('enterprise.create');
Route::post('/enterprise/save', 'admin\vinculacion\seguimiento\EnterpriseController@store')->name('enterprise.store');
Route::get('/enterprise/edit/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@edit')->name('enterprise.edit');
Route::put('/enterprise/edit/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@update')->name('enterprise.update');
Route::delete('/enterprise/delete/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@destroy')->name('enterprise.destroy');
Route::post('/enterprise/restore/{id}', 'admin\vinculacion\seguimiento\EnterpriseController@restore')->name('enterprise.restore');

Route::get('/institute', 'admin\vinculacion\seguimiento\InstitutionController@index')->name('institutions.index');
Route::get('/institute/new', 'admin\vinculacion\seguimiento\InstitutionController@create')->name('institutions.create');
Route::post('/institute/save', 'admin\vinculacion\seguimiento\InstitutionController@store')->name('institutions.store');
Route::get('/institute/edit/{id}', 'admin\vinculacion\seguimiento\InstitutionController@edit')->name('institutions.edit');
Route::put('/institute/edit/{id}', 'admin\vinculacion\seguimiento\InstitutionController@update')->name('institutions.update');
Route::delete('/institute/delete/{id}', 'admin\vinculacion\seguimiento\InstitutionController@destroy')->name('institutions.destroy');
Route::post('/institute/restore/{id}', 'admin\vinculacion\seguimiento\InstitutionController@restore')->name('institutions.restore');

Route::get('/shift', 'admin\vinculacion\seguimiento\ShiftController@index')->name('shift.index');
Route::get('/shift/new', 'admin\vinculacion\seguimiento\ShiftController@create')->name('shift.create');
Route::post('/shift/save', 'admin\vinculacion\seguimiento\ShiftController@store')->name('shift.store');
Route::get('/shift/edit/{id}', 'admin\vinculacion\seguimiento\ShiftController@edit')->name('shift.edit');
Route::put('/shift/edit/{id}', 'admin\vinculacion\seguimiento\ShiftController@update')->name('shift.update');
Route::delete('/shift/delete/{id}', 'admin\vinculacion\seguimiento\ShiftController@destroy')->name('shift.destroy');
Route::post('/shift/restore/{id}', 'admin\vinculacion\seguimiento\ShiftController@restore')->name('shift.restore');

Route::get('/modality', 'admin\vinculacion\seguimiento\ModalityController@index')->name('modalities.index');
Route::get('/modality/new', 'admin\vinculacion\seguimiento\ModalityController@create')->name('modalities.create');
Route::post('/modality/save', 'admin\vinculacion\seguimiento\ModalityController@store')->name('modalities.store');
Route::get('/modality/edit/{id}', 'admin\vinculacion\seguimiento\ModalityController@edit')->name('modalities.edit');
Route::put('/modality/edit/{id}', 'admin\vinculacion\seguimiento\ModalityController@update')->name('modalities.update');
Route::delete('/modality/delete/{id}', 'admin\vinculacion\seguimiento\ModalityController@destroy')->name('modalities.destroy');
Route::delete('/modality/restore/{id}', 'admin\vinculacion\seguimiento\ModalityController@restore')->name('modalities.restore');

Route::get('/school', 'admin\vinculacion\seguimiento\SchoolOriginController@index')->name('schools.index');
Route::get('/school/new', 'admin\vinculacion\seguimiento\SchoolOriginController@create')->name('schools.create');
Route::post('/school/save', 'admin\vinculacion\seguimiento\SchoolOriginController@store')->name('schools.store');
Route::get('/school/edit/{id}', 'admin\vinculacion\seguimiento\SchoolOriginController@edit')->name('schools.edit');
Route::put('/school/edit/{id}', 'admin\vinculacion\seguimiento\SchoolOriginController@update')->name('schools.update');
Route::delete('/school/delete/{id}', 'admin\vinculacion\seguimiento\SchoolOriginController@destroy')->name('schools.destroy');
Route::post('/school/restore/{id}', 'admin\vinculacion\seguimiento\SchoolOriginController@restore')->name('schools.restore');

Route::get('/degree', 'admin\vinculacion\seguimiento\DegreeController@index')->name('degrees.index');
Route::get('/degree/new', 'admin\vinculacion\seguimiento\DegreeController@create')->name('degrees.create');
Route::post('/degree/save', 'admin\vinculacion\seguimiento\DegreeController@store')->name('degrees.store');
Route::get('/degree/edit/{id}', 'admin\vinculacion\seguimiento\DegreeController@edit')->name('degrees.edit');
Route::put('/degree/edit/{id}', 'admin\vinculacion\seguimiento\DegreeController@update')->name('degrees.update');
Route::delete('/degree/delete/{id}', 'admin\vinculacion\seguimiento\DegreeController@destroy')->name('degrees.destroy');
Route::post('/degree/restore/{id}', 'admin\vinculacion\seguimiento\DegreeController@restore')->name('degrees.restore');

Route::get('/period', 'admin\vinculacion\seguimiento\PeriodController@index')->name('periods.index');
Route::get('/period/new', 'admin\vinculacion\seguimiento\PeriodController@create')->name('periods.create');
Route::post('/period/save', 'admin\vinculacion\seguimiento\PeriodController@store')->name('periods.store');
Route::get('/period/edit/{id}', 'admin\vinculacion\seguimiento\PeriodController@edit')->name('periods.edit');
Route::put('/period/edit/{id}', 'admin\vinculacion\seguimiento\PeriodController@update')->name('periods.update');
Route::delete('/period/delete/{id}', 'admin\vinculacion\seguimiento\PeriodController@destroy')->name('periods.destroy');
Route::post('/period/restore/{id}', 'admin\vinculacion\seguimiento\PeriodController@restore')->name('periods.restore');

Route::get('/gender', 'admin\vinculacion\seguimiento\GenderController@index')->name('genders.index');
Route::get('/gender/new', 'admin\vinculacion\seguimiento\GenderController@create')->name('genders.create');
Route::post('/gender/save', 'admin\vinculacion\seguimiento\GenderController@store')->name('genders.store');
Route::get('/gender/edit/{id}', 'admin\vinculacion\seguimiento\GenderController@edit')->name('genders.edit');
Route::put('/gender/edit/{id}', 'admin\vinculacion\seguimiento\GenderController@update')->name('genders.update');
Route::delete('/gender/delete/{id}', 'admin\vinculacion\seguimiento\GenderController@destroy')->name('genders.destroy');
Route::post('/gender/restore/{id}', 'admin\vinculacion\seguimiento\GenderController@restore')->name('genders.restore');

Route::get('/group', 'admin\vinculacion\seguimiento\GroupController@index')->name('groups.index');
Route::get('/group/new', 'admin\vinculacion\seguimiento\GroupController@create')->name('groups.create');
Route::post('/group/save', 'admin\vinculacion\seguimiento\GroupController@store')->name('groups.store');
Route::get('/group/edit/{id}', 'admin\vinculacion\seguimiento\GroupController@edit')->name('groups.edit');
Route::put('/group/edit/{id}', 'admin\vinculacion\seguimiento\GroupController@update')->name('groups.update');
Route::delete('/group/delete/{id}', 'admin\vinculacion\seguimiento\GroupController@destroy')->name('groups.destroy');
Route::post('/group/restore/{id}', 'admin\vinculacion\seguimiento\GroupController@restore')->name('groups.restore');

Route::get('/division', 'admin\vinculacion\seguimiento\AcademicDivisionController@index')->name('divisions.index');
Route::get('/division/new', 'admin\vinculacion\seguimiento\AcademicDivisionController@create')->name('divisions.create');
Route::post('/division/save', 'admin\vinculacion\seguimiento\AcademicDivisionController@store')->name('divisions.store');
Route::get('/division/edit/{id}', 'admin\vinculacion\seguimiento\AcademicDivisionController@edit')->name('divisions.edit');
Route::put('/division/edit/{id}', 'admin\vinculacion\seguimiento\AcademicDivisionController@update')->name('divisions.update');
Route::delete('/division/delete/{id}', 'admin\vinculacion\seguimiento\AcademicDivisionController@destroy')->name('divisions.destroy');
Route::post('/division/restore/{id}', 'admin\vinculacion\seguimiento\AcademicDivisionController@restore')->name('divisions.restore');

Route::get('/director', 'admin\vinculacion\seguimiento\AcademicDirectorController@index')->name('directors.index');
Route::get('/director/new', 'admin\vinculacion\seguimiento\AcademicDirectorController@create')->name('directors.create');
Route::post('/director/save', 'admin\vinculacion\seguimiento\AcademicDirectorController@store')->name('directors.store');
Route::get('/director/edit/{id}', 'admin\vinculacion\seguimiento\AcademicDirectorController@edit')->name('directors.edit');
Route::put('/director/edit/{id}', 'admin\vinculacion\seguimiento\AcademicDirectorController@update')->name('directors.update');
Route::delete('/director/delete/{id}', 'admin\vinculacion\seguimiento\AcademicDirectorController@destroy')->name('directors.destroy');
Route::post('/director/restore/{id}', 'admin\vinculacion\seguimiento\AcademicDirectorController@restore')->name('directors.restore');

Route::get('/quarter', 'admin\vinculacion\seguimiento\QuarterController@index')->name('quarters.index');
Route::get('/quarter/new', 'admin\vinculacion\seguimiento\QuarterController@create')->name('quarters.create');
Route::post('/quarter/save', 'admin\vinculacion\seguimiento\QuarterController@store')->name('quarters.store');
Route::get('/quarter/edit/{id}', 'admin\vinculacion\seguimiento\QuarterController@edit')->name('quarters.edit');
Route::put('/quarter/edit/{id}', 'admin\vinculacion\seguimiento\QuarterController@update')->name('quarters.update');
Route::delete('/quarter/delete/{id}', 'admin\vinculacion\seguimiento\QuarterController@destroy')->name('quarters.destroy');
Route::post('/quarter/restore/{id}', 'admin\vinculacion\seguimiento\QuarterController@restore')->name('quarters.restore');

Route::get('/importar', 'admin\vinculacion\seguimiento\ImportarAlumnoController@create')->name('imports.create');
Route::post('/importar/save', 'admin\vinculacion\seguimiento\ImportarAlumnoController@store')->name('imports.store');
Route::get('/importar/show/{id}', 'admin\vinculacion\seguimiento\ImportarAlumnoController@show')->name('imports.show');

Route::get('/studentcontact','admin\vinculacion\seguimiento\StudentContactController@index')->name('studentcontact.index');
Route::get('/studentcontact/edit/{id}','admin\vinculacion\seguimiento\StudentContactController@edit')->name('studentcontact.edit');
Route::put('/studentcontact/edit/{id}','admin\vinculacion\seguimiento\StudentContactController@update')->name('studentcontact.update');

Route::get('/advisor','admin\vinculacion\seguimiento\AcademicAdvisorController@index')->name('advisors.index');
Route::get('/advisor/new','admin\vinculacion\seguimiento\AcademicAdvisorController@create')->name('advisors.create');
Route::post('/advisor/save','admin\vinculacion\seguimiento\AcademicAdvisorController@store')->name('advisors.store');
Route::get('/advisor/edit/{id}','admin\vinculacion\seguimiento\AcademicAdvisorController@edit')->name('advisors.edit');
Route::put('/advisor/edit/{id}','admin\vinculacion\seguimiento\AcademicAdvisorController@update')->name('advisors.update');
Route::delete('/advisor/delete/{id}', 'admin\vinculacion\seguimiento\AcademicAdvisorController@destroy')->name('advisors.destroy');
Route::post('/advisor/restore/{id}', 'admin\vinculacion\seguimiento\AcademicAdvisorController@restore')->name('advisors.restore');

Route::get('/editore','admin\vinculacion\seguimiento\EditorStyleController@index')->name('editors.index');
Route::get('/editore/new','admin\vinculacion\seguimiento\EditorStyleController@create')->name('editors.create');
Route::post('/editore/save','admin\vinculacion\seguimiento\EditorStyleController@store')->name('editors.store');
Route::get('/editore/edit/{id}','admin\vinculacion\seguimiento\EditorStyleController@edit')->name('editors.edit');
Route::put('/editore/edit/{id}','admin\vinculacion\seguimiento\EditorStyleController@update')->name('editors.update');
Route::delete('/editore/delete/{id}', 'admin\vinculacion\seguimiento\EditorStyleController@destroy')->name('editors.destroy');
Route::post('/editore/restore/{id}', 'admin\vinculacion\seguimiento\EditorStyleController@restore')->name('editors.restore');

Route::get('/linking','admin\vinculacion\seguimiento\LinkingController@index')->name('linkings.index');
Route::get('/linking/new','admin\vinculacion\seguimiento\LinkingController@create')->name('linkings.create');
Route::post('/linking/save','admin\vinculacion\seguimiento\LinkingController@store')->name('linkings.store');
Route::get('/linking/edit/{id}','admin\vinculacion\seguimiento\LinkingController@edit')->name('linkings.edit');
Route::put('/linking/edit/{id}','admin\vinculacion\seguimiento\LinkingController@update')->name('linkings.update');
Route::delete('/linking/delete/{id}', 'admin\vinculacion\seguimiento\LinkingController@destroy')->name('linkings.destroy');
Route::post('/linking/restore/{id}', 'admin\vinculacion\seguimiento\LinkingController@restore')->name('linkings.restore');

Route::get('/programs','admin\vinculacion\seguimiento\EducativeProgramController@index')->name('programs.index');
Route::get('/programs/new','admin\vinculacion\seguimiento\EducativeProgramController@create')->name('programs.create');
Route::post('/programs/save','admin\vinculacion\seguimiento\EducativeProgramController@store')->name('programs.store');
Route::get('/programs/edit/{id}','admin\vinculacion\seguimiento\EducativeProgramController@edit')->name('programs.edit');
Route::put('/programs/edit/{id}','admin\vinculacion\seguimiento\EducativeProgramController@update')->name('programs.update');
Route::delete('/programs/delete/{id}', 'admin\vinculacion\seguimiento\EducativeProgramController@destroy')->name('programs.destroy');
Route::post('/programs/restore/{id}', 'admin\vinculacion\seguimiento\EducativeProgramController@restore')->name('programs.restore');


Route::get('/index/{doc}','admin\vinculacion\seguimiento\WordController@index')->name('word.index');

Route::get('/presenta','admin\vinculacion\seguimiento\PresentationController@index')->name('presentation.index');
Route::get('/presenta/edit/{id}','admin\vinculacion\seguimiento\PresentationController@edit')->name('presentation.edit');
Route::put('/presenta/edit/{id}','admin\vinculacion\seguimiento\PresentationController@update')->name('presentation.update');

Route::get('/excel','admin\vinculacion\seguimiento\ExcelController@index')->name('excel.index');

Route::get('/importerCompany', 'admin\vinculacion\seguimiento\ImporterEnterpriseController@create')->name('importscompany.create');
Route::post('/importerCompany/save', 'admin\vinculacion\seguimiento\ImporterEnterpriseController@store')->name('importscompany.store');
Route::get('/importerCompany/show/{id}', 'admin\vinculacion\seguimiento\ImporterEnterpriseController@show')->name('importscompany.show');

Route::get('/colors','admin\vinculacion\seguimiento\ColorController@index')->name('colors.index');
Route::get('/colors/new','admin\vinculacion\seguimiento\ColorController@create')->name('colors.create');
Route::post('/colors/save','admin\vinculacion\seguimiento\ColorController@store')->name('colors.store');
Route::get('/colors/edit/{id}','admin\vinculacion\seguimiento\ColorController@edit')->name('colors.edit');
Route::put('/colors/edit/{id}','admin\vinculacion\seguimiento\ColorController@update')->name('colors.update');
Route::delete('/colors/{id}', 'admin\vinculacion\seguimiento\ColorController@destroy')->name('colors.destroy');
