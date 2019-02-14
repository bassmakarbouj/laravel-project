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
    /* Home */
    Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

    /*Profile*/
    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::post('update_my_profile/{user_id}','ProfileController@updateMyProfile');

    /* control */
    Route::post('/edit_user_profile/{user_id}', 'ControlController@editUserProfile');
    Route::get('/delete_manager_account/{manager_id}', 'ControlController@deleteManagerAccount');
    Route::get('/delete_student_account/{student_id}', 'ControlController@deleteStudentAccount');
    Route::get('/student', 'ControlController@student')->name('student_account');
    Route::get('/add_manager/{role}/{user}', 'ControlController@addManager')->name('add_manager');
    Route::get('/show_all', 'ControlController@showAll')->name('control');



    /* Course */
    Route::get('/course','CourseController@course')->name('course');
    Route::get('/course/{course_id}','CourseController@oneCourse')->name('course');
    Route::get('/new_course','CourseController@newCourse')->name('new_course');
    Route::post('createCourse','CourseController@createCourse');
    Route::post('editCourse/{course_id}','CourseController@editCourse');
    Route::get('deleteCourse/{course_id}','CourseController@deleteCourse');

    /* Category */
    Route::post('create_course_category','CourseCategoryController@createCourseCategory');
    Route::post('edit_course_category/{cat_id}','CourseCategoryController@editCourseCategory');
    Route::get('delete_course_category/{cat_id}','CourseCategoryController@deleteCourseCategory');
    Route::get('/course_category','CourseCategoryController@courseCategory')->name('course_category');


    /* Form Register */
    Route::post('/add_form/{course}','FormregisterController@addForm');
    Route::post('/add_form_template/{form_id}','FormregisterController@addFormTemplate');
    Route::post('/edit_form_template/{form_template_id}','FormregisterController@editFormTemplate');
    Route::post('/edit_form/{form_id}','FormregisterController@editForm');
    Route::get('/form_template','FormregisterController@formTemplate');
    Route::get('/form','FormregisterController@form');
    Route::get('/delete_Form/{form_id}','FormregisterController@deleteForm');
    Route::get('/delete_Form_template/{form_template_id}','FormregisterController@deleteFormTemplate');

});
