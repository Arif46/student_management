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
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/student','StudentController@create');
Route::get('/allstudent','StudentController@GetAllStudent');
Route::post('/course','CourseController@create');
Route::get('/allcourse','CourseController@GetAllCourse');
Route::post('/enrolement', 'EnrolementController@create');
Route::get('/allenrolement/{id}','EnrolementController@GetAllEnrolement');