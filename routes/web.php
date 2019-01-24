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

//PageControll Route
// Route::get('page1','PageControllers@p1');
Route::get('page2','PageControllers@show');
Route::get('page/{mypage}','PageControllers@onepage');
Route::post('pagestore','PageControllers@store');
Route::get('page/{id}/delete','PageControllers@delete');

//NoteControlle Route
Route::post('page/{mypage}/thenote','NoteController@addnote');
Route::get('page/{not_id}/deleten','NoteController@deletenote');
Route::get('page/{not_id}/editn','NoteController@editNote');
Route::post('page/{not_id}/update','NoteController@updateNote');



//Authintication Route
Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

//Profile
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('update-my-profile/{user_id}','ProfileController@updateProfile');

//Control
Route::get('/control', 'ControlController@control')->name('control');
Route::get('/add_manager', 'ControlController@control')->name('add_manager');
Route::get('/student_account', 'ControlController@control')->name('student_account');
/*Course*/
Route::post('createCourse','ControlController@createCourse');
/*Category*/
Route::post('createCategory','ControlController@createCategory');
Route::post('editCategory/{cat_id}','ControlController@editCategory');
Route::get('deleteCategory/{cat_id}','ControlController@deleteCategory');
Route::get('deleteCourse/{course_id}','ControlController@deleteCourse');
Route::post('editCourse/{course_id}','ControlController@editCourse');



Route::get('/course','CourseController@course')->name('course');
Route::get('/new_course','NewCourseController@newCourse')->name('new_course');
Route::get('/course_category','CourseCategoryController@courseCategory')->name('course_category');
Route::get('/form_register','FormregisterController@formRegister')->name('form_register');

