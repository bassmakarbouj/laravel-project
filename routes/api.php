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
    Route::get('/show_control', 'ControlController@showControl')->name('control');
    Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

    /*Profile*/
    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::post('update-my-profile/{user_id}','ProfileController@updateProfile');
    Route::post('/edit_profile/{id}', 'ControlController@editProfile');
    Route::get('/delete_manager_account/{manager}', 'ControlController@deleteManager');
    Route::get('/delete_student_account/{student}', 'ControlController@deleteStudent');
    Route::get('/show_student', 'ControlController@showStudent')->name('student_account');

    /*Users Role Control*/
    Route::post('/add_manager/{role}/{user}', 'ControlController@addManager')->name('add_manager');

    /*Course*/
    Route::get('/course','CourseController@course')->name('course');
    Route::get('/course/{course_id}','CourseController@oneCourse')->name('course');
    Route::get('/new_course','NewCourseController@newCourse')->name('new_course');
    Route::post('createCourse','ControlController@createCourse');
    Route::post('editCourse/{course_id}','ControlController@editCourse');
    Route::get('deleteCourse/{course_id}','ControlController@deleteCourse');

    /*Category*/
    Route::post('createCategory','ControlController@createCategory');
    Route::post('editCategory/{cat_id}','ControlController@editCategory');
    Route::get('deleteCategory/{cat_id}','ControlController@deleteCategory');
    Route::get('/course_category','CourseCategoryController@courseCategory')->name('course_category');


    /*Form Register */
    Route::post('/add_form/{course}','FormregisterController@addForm');
    Route::post('/register_form/{form_id}','FormregisterController@registerForm');
    Route::post('/edit_register_form/{form_template_id}','FormregisterController@editForm');
    Route::get('/show_form','FormregisterController@showForm');
    Route::get('/delete_Form/{form_id}','FormregisterController@deleteForm');
    Route::get('/delete_Form_template/{form_template_id}','FormregisterController@deleteFormTemplate');

});
