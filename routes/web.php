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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('employee')->group(function () {
  Route::get('','EmployeeController@index');
  Route::get('/create','EmployeeController@create');
  Route::post('/create','EmployeeController@store');
  Route::get('view/{id}','EmployeeController@show');
  Route::get('/edit/{id}','EmployeeController@edit');
  Route::post('/edit/{id}','EmployeeController@update');
  Route::get('/delete/{id}','EmployeeController@delete');
});


Route::prefix('attendence')->group(function () {
  Route::get('','AttendenceController@index');
  Route::get('/create','AttendenceController@create');
  Route::post('/create','AttendenceController@store');
  Route::get('/edit/{id}','AttendenceController@edit');
  Route::post('/edit/{id}','AttendenceController@update');
  Route::get('/delete/{id}','AttendenceController@delete');
  Route::get('/employees','AttendenceController@display');

});
