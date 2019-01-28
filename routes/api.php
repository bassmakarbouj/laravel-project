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

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');
Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});

Route::middleware('jwt.auth')->group(function () {
    Route::get('/control', 'ControlController@control')->name('control');
    Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

//Profile
    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::post('update-my-profile/{user_id}','ProfileController@updateProfile');

//Control
    Route::post('/add_manager/{role}/{user}', 'ControlController@addManager')->name('add_manager');
    Route::post('/student_account/{student}', 'ControlController@editStudent')->name('student_account');
    Route::get('/student', 'ControlController@showStudent')->name('student_account');
    /*Course*/ /*Category*/
    Route::post('createCourse','ControlController@createCourse');
    Route::post('createCategory','ControlController@createCategory');
    Route::post('editCategory/{cat_id}','ControlController@editCategory');
    Route::get('deleteCategory/{cat_id}','ControlController@deleteCategory');
    Route::get('deleteCourse/{course_id}','ControlController@deleteCourse');
    Route::post('editCourse/{course_id}','ControlController@editCourse');


    Route::get('/course','CourseController@course')->name('course');
    Route::get('/new_course','NewCourseController@newCourse')->name('new_course');
    Route::get('/course_category','CourseCategoryController@courseCategory')->name('course_category');
    Route::get('/form_register','FormregisterController@formRegister')->name('form_register');


});
