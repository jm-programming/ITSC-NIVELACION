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

Route::get('/home', function () {
	return view('home');

});
//routes manteniemiento estudiante
Route::get('students_s', 'StudentsController@search');
Route::resource('students', 'StudentsController');

//routes mantenimiento empleados
Route::get('employees_s', 'EmployeesController@search');
Route::resource('employees', 'EmployeesController');

//routes mantenimiento aulas
Route::get('classrooms_s', 'ClassroomsController@search');
Route::resource('classrooms', 'ClassroomsController');

//routes mantenimiento periodos academicos
Route::get('academic_periods_s', 'Academic_PeriodsController@search');
Route::resource('academic_periods', 'Academic_PeriodsController');

//routes mantenimiento secciones
Route::get('sections_s', 'SectionsController@search');
Route::resource('sections', 'SectionsController');
