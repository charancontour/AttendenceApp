<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('employee')->group(function () {
  Route::get('','EmployeeApiController@index');
  Route::post('create','EmployeeApiController@store');
  Route::get('view/{id}','EmployeeApiController@show');
  Route::post('edit/{id}','EmployeeApiController@update');
  Route::get('delete/{id}','EmployeeApiController@delete');
});
