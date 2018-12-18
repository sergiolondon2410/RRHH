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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/template', function () {
//     return view('template');
// });

// ---------------- Usuarios (Inicio) ---------------------

// Route::get('/usuarios', 'UserController@index')->name('users.index');
// Route::get('/usuarios/{user}', 'UserController@show')->name('users.show');
// Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
// Route::post('/usuarios/crear', 'UserController@store')->name('users.store');
// Route::get('/usuarios/editar/{user}', 'UserController@edit')->name('users.edit');
// Route::put('/usuarios/{user}', 'UserController@update')->name('users.update');
// Route::delete('/usuarios/{id}', 'UserController@destroy')->name('users.destroy');
Route::resource('users', 'UserController');

// ---------------- Usuarios (Final) ---------------------

// Rutas para aplicación (Se debe cambiar por error de ortografía) BORRAR
Route::get('/aplicacion', 'AplicationController@index');
Route::get('/aplicacion/nuevo/{id}', 'AplicationController@create')->name('aplication.create');
Route::post('/aplicacion/crear', 'AplicationController@store');


// Rutas para implementación //Para borrar
Route::get('/implementacion', 'ImplementationController@index');

//Rutas Respuestas
// Route::get('/respuestas/nuevo/{aplication_id}/{contador}', 'AnswerController@create')->name('answer.create');
// Route::post('/respuestas/crear', 'AnswerController@store');
Route::get('/answers/{application}/index', 'AnswerController@index')->name('answers.index');
Route::get('/answers/{application}/{contador}/create', 'AnswerController@create')->name('answers.create');
Route::post('/answers/{application}/{question}/{count}', 'AnswerController@store')->name('answers.store');

//Rutas Empresas
Route::get('/empresas', 'OrganizationController@index');
Route::get('/empresas/{id}', 'OrganizationController@show')->where('id', '[0-9]+');
Route::get('/empresas/nuevo', 'OrganizationController@create');
Route::post('/empresas/crear', 'OrganizationController@store');

//Rutas Evaluaciones
Route::get('/evaluations', 'EvaluationController@index')->name('evaluations.index');
Route::get('/evaluations/{evaluation}', 'EvaluationController@show')->name('evaluations.show');
Route::get('/evaluations/{process}/create', 'EvaluationController@create')->name('evaluations.create');
Route::post('/evaluations/{process}', 'EvaluationController@store')->name('evaluations.store');
Route::get('/evaluations/{evaluation}/edit', 'EvaluationController@edit')->name('evaluations.edit');
Route::put('/evaluations/{evaluation}', 'EvaluationController@update')->name('evaluations.update');

//Rutas Competencias
Route::get('/competencias', 'CompetenceController@index')->name('competences.index');
Route::get('/competencias/{id}', 'CompetenceController@show')->name('competences.show')->where('id', '[0-9]+');
Route::get('/competencias/nuevo', 'CompetenceController@create')->name('competences.create');
Route::post('/competencias/crear', 'CompetenceController@store')->name('competences.store');
Route::get('/competencias/editar/{competence}', 'CompetenceController@edit')->name('competences.edit');
Route::put('/competencias/{competence}', 'CompetenceController@update')->name('competences.update');

//Rutas Preguntas
Route::get('/preguntas', 'QuestionController@index')->name('questions.index');
Route::get('/preguntas/{question}', 'QuestionController@show')->name('questions.show');
Route::get('/preguntas/{evaluationtype}/create', 'QuestionController@create')->name('questions.create');
Route::post('/preguntas/{evaluationtype}', 'QuestionController@store')->name('questions.store');
Route::get('/preguntas/{question}/edit', 'QuestionController@edit')->name('questions.edit');
Route::put('/preguntas/{question}', 'QuestionController@update')->name('questions.update');

//Rutas Escalas de medición
Route::resource('scales', 'ScaleController');

//Rutas Medidas
// Route::resource('measures', 'MeasureController');
Route::get('/measures/create/{scale}', 'MeasureController@create')->name('measures.create');
Route::post('/measures/{scale}', 'MeasureController@store')->name('measures.store');
Route::get('/measures/editar/{measure}', 'MeasureController@edit')->name('measures.edit');
Route::put('/measures/{measure}', 'MeasureController@update')->name('measures.update');

//Rutas Tipos de evaluación
Route::resource('evaluationtypes', 'EvaluationTypeController');

//Rutas Procesos de selección
Route::resource('processes', 'ProcessController');

//Rutas Premios
Route::resource('awards', 'AwardController');

//Rutas Reconocimientos
Route::resource('accomplishments', 'AccomplishmentController');

//Rutas Evaluaciones x Preguntas
Route::get('/evaluationquestion/{evaluation}/create', 'EvaluationQuestionController@create')->name('evaluationquestion.create');
Route::post('/evaluationquestion/{evaluation}', 'EvaluationQuestionController@store')->name('evaluationquestion.store');

//Rutas Aplicaciones
Route::get('/applications/{evaluation}/index', 'ApplicationController@index')->name('applications.index');
Route::get('/applications/show', 'ApplicationController@show')->name('applications.show');
Route::get('/applications/{user}/create', 'ApplicationController@create')->name('applications.create');
Route::get('/applications/{user}/{evaluation}/edit', 'ApplicationController@edit')->name('applications.edit');
Route::post('/applications/{user}/{evaluation}/', 'ApplicationController@store')->name('applications.store');
Route::get('/applications/{application}/complete/', 'ApplicationController@complete')->name('applications.complete');
Route::get('/applications/filter', 'ApplicationController@filter')->name('applications.filter');
Route::get('/applications/report/', 'ApplicationController@report')->name('applications.report');
Route::get('/applications/chart/', 'ApplicationController@chart')->name('applications.chart');
Route::get('/applications/{evaluation}/results/', 'ApplicationController@results')->name('applications.results');
Route::get('/applications/{application}/detail/', 'ApplicationController@detail')->name('applications.detail');
Route::get('/applications/{application}/evaluate/', 'ApplicationController@evaluate')->name('applications.evaluate');
Route::get('/applications/{user}/{evaluation}/usercomputation/', 'ApplicationController@userComputation')->name('applications.usercomputation');
Route::get('/applications/{user}/{evaluation}/useranswers/', 'ApplicationController@userAnswers')->name('applications.useranswers');
Route::get('/applications/{user}/{evaluation}/usercomputationprint/', 'ApplicationController@userComputationPrint')->name('applications.usercomputationprint');
Route::get('/applications/{evaluation}/userresults/', 'ApplicationController@userResults')->name('applications.userresults');
Route::get('/applications/{evaluation}/resultspdf/', 'ApplicationController@resultsPdf')->name('applications.resultspdf');
Route::get('/applications/organization', 'ApplicationController@organizationFilter')->name('applications.organization');
Route::get('/applications/process', 'ApplicationController@processFilter')->name('applications.process');

//Rutas Compromisos
Route::get('/compromises/organization/', 'CompromiseController@organization')->name('compromises.organization');
Route::post('/compromises/user/', 'CompromiseController@user')->name('compromises.user');
Route::post('/compromises/validator/', 'CompromiseController@validator')->name('compromises.validator');
Route::get('/compromises/{user}/{evaluation}/create/', 'CompromiseController@create')->name('compromises.create');
Route::post('/compromises/{user}/{evaluation}/', 'CompromiseController@store')->name('compromises.store');
Route::get('/compromises', 'CompromiseController@index')->name('compromises.index');
Route::get('/compromises/{compromise}/', 'CompromiseController@show')->name('compromises.show');

//Rutas Reconocimientos
Route::get('/recognitions', 'RecognitionController@index')->name('recognitions.index');
Route::get('/recognitions/{user}/{evaluation}/create/', 'RecognitionController@create')->name('recognitions.create');
Route::post('/recognitions/{user}/{evaluation}/', 'RecognitionController@store')->name('recognitions.store');

//Rutas Requerimientos de capacitación
Route::get('/trainings/{user}/{evaluation}/create/', 'TrainingController@create')->name('trainings.create');
Route::post('/trainings/{user}/{evaluation}/', 'TrainingController@store')->name('trainings.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
