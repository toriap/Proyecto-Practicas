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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/* -----------------------------------------------------RUTAS ADMIN ---------------------------------------------------- */
Route::get('/directores', 'UserController@listDirectors')->name('user.listDirectors')->middleware(['auth', 'role:admin']);
Route::get('/edit-director/{id}', 'UserController@updateShowDirector')->name('user.updateShowDirector')->middleware(['auth', 'role:admin']);
Route::post('/update-director', 'UserController@updateDirector')->name('user.updateDirector')->middleware(['auth', 'role:admin']);
Route::get('/delete-director/{id}', 'UserController@deleteDirector')->name('user.deleteDirector')->middleware(['auth', 'role:admin']);
Route::get('/lapse', 'LapseController@index')->name('lapse')->middleware(['auth', 'role:admin']);
Route::post('/lapse/save', 'LapseController@save')->name('lapse.save')->middleware(['auth', 'role:admin']);
Route::get('/lapse-show/{id?}', 'LapseController@show')->name('lapse.show')->middleware(['auth', 'role:admin']);
Route::post('/lapse/edit', 'LapseController@edit')->name('lapse.edit')->middleware(['auth', 'role:admin']);
Route::get('/decan', 'DecanController@index')->name('decan')->middleware(['auth', 'role:admin']);
Route::get('/decan/edit/{id?}', 'DecanController@edit')->name('decan.edit')->middleware(['auth', 'role:admin']);
Route::post('/decan/update', 'DecanController@update')->name('decan.update')->middleware(['auth', 'role:admin']);
Route::post('/decan/save', 'DecanController@save')->name('decan.save')->middleware(['auth', 'role:admin']);
Route::get('/section', 'SectionController@index')->name('section')->middleware(['auth', 'role:admin']);
Route::post('/section/save', 'SectionController@save')->name('section.save')->middleware(['auth', 'role:admin']);
Route::get('/section-show/{id?}', 'SectionController@show')->name('section.show')->middleware(['auth', 'role:admin']);
Route::post('/section/edit', 'SectionController@edit')->name('section.edit')->middleware(['auth', 'role:admin']);
Route::get('/school', 'SchoolController@index')->name('school')->middleware(['auth', 'role:admin']);
Route::post('/school/save', 'SchoolController@save')->name('school.save')->middleware(['auth', 'role:admin']);
Route::get('/school-show/{id?}', 'SchoolController@show')->name('school.show')->middleware(['auth', 'role:admin']);
Route::post('/school/edit', 'SchoolController@edit')->name('school.edit')->middleware(['auth', 'role:admin']);
Route::get('/subject', 'SubjectController@index')->name('subject')->middleware(['auth', 'role:admin']);
Route::post('/subject/save', 'SubjectController@save')->name('subject.save')->middleware(['auth', 'role:admin']);
Route::get('/delete-subject/{id}', 'SubjectController@delete')->name('subject.delete')->middleware(['auth', 'role:admin']);

Route::get('/delete-lapse/{id}', 'LapseController@delete')->name('lapse.delete')->middleware(['auth', 'role:admin']);
Route::get('/delete-decan/{id}', 'DecanController@delete')->name('decan.delete')->middleware(['auth', 'role:admin']);
Route::get('/delete-school/{id}', 'SchoolController@delete')->name('school.delete')->middleware(['auth', 'role:admin']);
Route::get('/delete-section/{id}', 'SectionController@delete')->name('section.delete')->middleware(['auth', 'role:admin']);


//                                      RUTAS DE ADMIN CON ACCESO A DIRECTOR
Route::get('/operatives-admin/{report?}', 'UserController@listOperatives')->name('user.listOperativesAdmin')->middleware(['auth', 'role:admin']);
Route::get('/delete-operative-admin/{id}/{role}', 'UserController@deleteOperative')->name('user.deleteOperativeAdmin')->middleware(['auth', 'role:admin']);
Route::get('/edit-operative-admin/{id}', 'UserController@updateShowOperative')->name('user.updateShowOperativeAdmin')->middleware(['auth', 'role:admin']);
Route::post('/update-operative-admin', 'UserController@updateOperative')->name('user.updateOperativeAdmin')->middleware(['auth', 'role:admin']);

Route::post('/update-operative-admin', 'UserController@updateOperative')->name('user.updateOperativeAdmin')->middleware(['auth', 'role:admin']);
Route::get('/delete-subcjet-Ope-admin/{user_id}/{id}', 'UserController@deleteSubject')->name('user.deleteSubjectOpeAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters.admin', 'ParameterController@index')->name('parametersAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters-schools-admin/{id}', 'ParameterController@getSchoolsByDecan')->name('parameters.ajaxSchoolsAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters-subjects-admin/{id}', 'ParameterController@getSubjectsByUser')->name('parameters.ajaxSubjectsAdmin')->middleware(['auth', 'role:admin']);
Route::post('/parameters/save-admin', 'ParameterController@save')->name('parameters.saveAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters/report-complete-admin', 'ParameterController@reportComplete')->name('parameters.reportCompleteAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters/report-operative-admin/{id}', 'ParameterController@reportByOperative')->name('parameters.operativeReportAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters-stages-admin/{subject_id}/{user_id}', 'ParameterController@getStagesByUser')->name('parameters.ajaxStagesAdmin')->middleware(['auth', 'role:admin']);

Route::get('/subject-list-admin', 'SubjectController@list')->name('subject.listAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters/subject-report-admin/{id}', 'ParameterController@reportBySubject')->name('parameters.subjectReportAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters/statistics-admin', 'ParameterController@statistics')->name('parameters.statisticsAdmin')->middleware(['auth', 'role:admin']);

Route::get('/decan-list-admin', 'DecanController@list')->name('decan.listAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters/decan-report-admin/{id}', 'ParameterController@reportByDecan')->name('parameters.decanReportAdmin')->middleware(['auth', 'role:admin']);

Route::get('/school-list-admin', 'SchoolController@list')->name('school.listAdmin')->middleware(['auth', 'role:admin']);
Route::get('/parameters/school-report-admin/{id}', 'ParameterController@reportBySchool')->name('parameters.schoolReportAdmin')->middleware(['auth', 'role:admin']);

Route::get('/configuracion-admin', 'UserController@config')->name('config.admin')->middleware(['auth', 'role:admin']);
Route::post('/update-admin', 'UserController@updateAdmin')->name('user.updateAdmin')->middleware(['auth', 'role:admin']);

/* -----------------------------------------------------RUTAS DIRECTOR ---------------------------------------------------- */
Route::get('/operatives/{report?}', 'UserController@listOperatives')->name('user.listOperatives')->middleware(['auth', 'role:director']);
Route::get('/delete-operative/{id}/{role}', 'UserController@deleteOperative')->name('user.deleteOperative')->middleware(['auth', 'role:director']);
Route::get('/edit-operative/{id}', 'UserController@updateShowOperative')->name('user.updateShowOperative')->middleware(['auth', 'role:director']);
Route::post('/update-operative', 'UserController@updateOperative')->name('user.updateOperative')->middleware(['auth', 'role:director']);
Route::get('/delete-subcjet-Ope/{user_id}/{id}', 'UserController@deleteSubject')->name('user.deleteSubjectOpe')->middleware(['auth', 'role:director']);
Route::get('/parameters', 'ParameterController@index')->name('parameters')->middleware(['auth', 'role:director']);
Route::get('/parameters-schools/{id}', 'ParameterController@getSchoolsByDecan')->name('parameters.ajaxSchools')->middleware(['auth', 'role:director']);
Route::get('/parameters-subjects/{id}', 'ParameterController@getSubjectsByUser')->name('parameters.ajaxSubjects')->middleware(['auth', 'role:director']);
Route::post('/parameters/save', 'ParameterController@save')->name('parameters.save')->middleware(['auth', 'role:director']);
Route::get('/parameters/report-complete', 'ParameterController@reportComplete')->name('parameters.reportComplete')->middleware(['auth', 'role:director']);
Route::get('/parameters/report-operative/{id}', 'ParameterController@reportByOperative')->name('parameters.operativeReport')->middleware(['auth', 'role:director']);
Route::get('/parameters-stages/{subject_id}/{user_id}', 'ParameterController@getStagesByUser')->name('parameters.ajaxStages')->middleware(['auth', 'role:director']);

Route::get('/subject-list', 'SubjectController@list')->name('subject.list')->middleware(['auth', 'role:director']);
Route::get('/parameters/subject-report/{id}', 'ParameterController@reportBySubject')->name('parameters.subjectReport')->middleware(['auth', 'role:director']);
Route::get('/parameters/statistics', 'ParameterController@statistics')->name('parameters.statistics')->middleware(['auth', 'role:director']);

Route::get('/decan-list', 'DecanController@list')->name('decan.list')->middleware(['auth', 'role:director']);
Route::get('/parameters/decan-report/{id}', 'ParameterController@reportByDecan')->name('parameters.decanReport')->middleware(['auth', 'role:director']);

Route::get('/configuracion', 'UserController@config')->name('config')->middleware(['auth', 'role:director']);
Route::post('/update-director-user', 'UserController@updateDirector')->name('user.updateDirectorUser')->middleware(['auth', 'role:director']);

Route::get('/school-list', 'SchoolController@list')->name('school.list')->middleware(['auth', 'role:director']);
Route::get('/parameters/school-report/{id}', 'ParameterController@reportBySchool')->name('parameters.schoolReport')->middleware(['auth', 'role:director']);


// OPERATIVO
//Route::get('/report-operative/{id}', 'ParameterController@reportByOperative')->name('operativeReport')->middleware(['auth', 'role:operativo']);


// Registration Routes...
Route::get('registro-director', 'Auth\RegisterController@showRegistrationForm')->name('register.director')->middleware(['auth', 'role:admin']);
Route::get('registro-operativo/{docente?}', 'Auth\RegisterController@showRegistrationForm')->name('register.operative')->middleware(['auth', 'role:director']);
Route::get('registro-operativo.admin/{docente?}', 'Auth\RegisterController@showRegistrationForm')->name('register.operativeAdmin')->middleware(['auth', 'role:admin']);
