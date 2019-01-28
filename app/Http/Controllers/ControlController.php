<?php

namespace App\Http\Controllers;

use App\CategoryCourse;
use App\Http\Requests\CreateCategoryCourseRequest;
use App\Http\Requests\CreateCourseRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Auth;

use DB;
use App\Course;
use Schema;
use App\Http\Requests\ShowControlWindowRequest;

class ControlController extends Controller
{
    public function control(ShowControlWindowRequest $request){
        $courses = DB::table('course')->get()->all();
//        $filtered_courses = $courses->map(function ($item) {
//            return collect($item)->except(['id', 'created_at', 'updated_at'])->all();
//        });
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->all();
        $category_feild = Schema::getColumnListing('category_course');
        return [$courses , $cousre_feild , $category , $category_feild];
    }

    public function createCourse(CreateCourseRequest $request){
//        dd("ggg");
        $course = new Course($request->validated());
//        dd($course);
        $course->save();
        return $course;


    }

    public function createCategory(CreateCategoryCourseRequest $request){
        $category = new CategoryCourse;
        $category->name = $request->name;
        $category->save();
       return $category;
    }

    public function editCategory(Request $request ,CategoryCourse $cat_id){
//        dd($cat_id);
        $cat_id->update($request->all());
        $cat_id->save();
        return $cat_id;
    }

    public function editCourse(Request $request ,Course $course_id){
//        dd($course_id);
        $course_id->update($request->all());
        return $course_id;
    }

    public function deleteCategory(CategoryCourse $cat_id){
        $cat_id->delete();
        return $cat_id;

    }
    public function deleteCourse(Course $course_id){
        $course_id->delete();
        return $course_id;

    }

    public function addManager(Role $role , User $user){
        $user->roles()->sync([$role->id]);
        return $user;
    }

    public function showStudent(){
        $student_role = DB::table('role_user')->where('role_id',3)->pluck('user_id')->toArray();
        $student = array_values($student_role);
        $all_student=DB::table('users')->whereIn('id',$student)->get();
        return $all_student;

    }
    public function editStudent(Request $request,User $student){
        $student->update($request->all());
        return $student;

    }
}
