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

Route::get('/usuarios', 'UserController@index')->name('users.index');
Route::get('/usuarios/{id}', 'UserController@show')->where('id', '[0-9]+');
Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
Route::post('/usuarios/crear', 'UserController@store');
Route::get('/usuarios/editar/{id}', 'UserController@edit')->where('id', '[0-9]+');
Route::put('/usuarios/{id}', 'UserController@update')->where('id', '[0-9]+');
Route::delete('/usuarios/{id}', 'UserController@destroy')->where('id', '[0-9]+');

// ---------------- Usuarios (Final) ---------------------

// Rutas para aplicación (Se debe cambiar por error de ortografía)
Route::get('/aplicacion', 'AplicationController@index');
Route::get('/aplicacion/nuevo/{id}', 'AplicationController@create')->name('aplication.create');
Route::post('/aplicacion/crear', 'AplicationController@store');

// Rutas para implementación
Route::get('/implementacion', 'ImplementationController@index');

//Rutas Respuestas

Route::get('/respuestas/nuevo/{aplication_id}/{contador}', 'AnswerController@create')->name('answer.create');
Route::post('/respuestas/crear', 'AnswerController@store');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
