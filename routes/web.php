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
	return redirect('/login');
});

Auth::routes();

Route::get('home_s', 'HomeController@search');
Route::resource('home', 'HomeController');

//routes manteniemiento estudiante
Route::get('students_s', 'StudentsController@search');
Route::resource('students', 'StudentsController');

//routes mantenimiento empleados
Route::get('employees_s', 'EmployeesController@search');
Route::resource('employees', 'EmployeesController');

//routes para el mantenimiento de profesores
Route::get('teachers_s', 'TeacherController@search');
Route::resource('teachers', 'TeacherController');


//routes mantenimiento aulas
Route::get('classrooms_s', 'ClassroomsController@search');
Route::resource('classrooms', 'ClassroomsController');

//routes mantenimiento periodos academicos
Route::get('academic_periods_s', 'Academic_PeriodsController@search');
Route::resource('academic_periods', 'Academic_PeriodsController');

//routes mantenimiento secciones
Route::get('sections_s', 'SectionsController@search');
Route::resource('sections', 'SectionsController');

//routes mantenimiento de usuarios
Route::resource('users', 'UserController');

//routes mantenimiento inscribed


//routes mantenimiento historico
 
//routes mantenimiento de citas de idiomas
Route::resource('languages','Language_quotesController');

//routes mantenimiento de Subjects
Route::resource('subjects', 'SubjectController');