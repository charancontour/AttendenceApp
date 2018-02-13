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

Route::get('calender',function(){
  return view('calender');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('employee')->group(function () {
  Route::get('','EmployeeController@index')->middleware('auth');
  Route::get('/create','EmployeeController@create')->middleware('auth');
  Route::post('/create','EmployeeController@store')->middleware('auth');
  Route::get('view/{id}','EmployeeController@show')->middleware('auth');
  Route::get('/edit/{id}','EmployeeController@edit')->middleware('auth');
  Route::post('/edit/{id}','EmployeeController@update')->middleware('auth');
  Route::get('/delete/{id}','EmployeeController@delete')->middleware('auth');

});


Route::prefix('attendence')->group(function () {
  Route::get('','AttendenceController@index')->middleware('auth');
  Route::get('/create','AttendenceController@create')->middleware('auth');
  Route::post('/create','AttendenceController@store')->middleware('auth');
  Route::get('/edit/{id}','AttendenceController@edit')->middleware('auth');
  Route::post('/edit/{id}','AttendenceController@update')->middleware('auth');
  Route::get('/delete/{id}','AttendenceController@delete')->middleware('auth');
  Route::get('/employees','AttendenceController@display')->middleware('auth');

  Route::get('/calender','AttendenceController@calender')->middleware('auth');
  



});
Route::prefix('report')->group(function () {
  Route::get('','ReportController@index')->middleware('auth');
  

});



