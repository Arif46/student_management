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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');


Route::middleware('auth:api')->group( function () {

Route::post('/student','StudentController@create');
Route::post('/studentupdate/{id}','StudentController@UpdateStudentData');
Route::delete('studentdelete/{id}','StudentController@DeleteStudent');
Route::get('/allstudent','StudentController@GetAllStudent');
Route::post('/course','CourseController@create');
Route::get('/allcourse','CourseController@GetAllCourse');
Route::post('/enrolement', 'EnrolementController@create');
Route::get('/allenrolement/{id}','EnrolementController@GetAllEnrolement');
Route::post('/jsondata','JsonController@create');
Route::get('/alljsondata','JsonController@GetAlljsondata');


// Route::fallback(function(){
//  return response()->json([
//      'message' => 'invalid Url'], 404);
// });

});

