<?php

namespace App\Http\Controllers;

use App\CategoryCourse;
use App\Http\Requests\CreateCategoryCourseRequest;
use App\Http\Requests\CreateCourseRequest;
use Illuminate\Http\Request;
use Auth;
use User;
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
        return view('control', compact('category_feild','cousre_feild' ,'category' ,'courses','filtered_courses'));
    }

    public function createCourse(CreateCourseRequest $request){
//        dd("ggg");
        $course = new Course($request->validated());
//        dd($course);
        $course->save();
        return redirect("control");


    }

    public function createCategory(CreateCategoryCourseRequest $request){
        $category = new CategoryCourse;
        $category->name = $request->name;
        $category->save();
       return redirect("control");
    }

    public function editCategory(Request $request ,CategoryCourse $cat_id){
//        dd($cat_id);
        $cat_id->update($request->all());
        return back();
    }

    public function editCourse(Request $request ,Course $course_id){
//        dd($course_id);
        $course_id->update($request->all());
        return back();
    }

    public function deleteCategory(CategoryCourse $cat_id){
        $cat_id->delete();
        return back();

    }
    public function deleteCourse(Course $course_id){
        $course_id->delete();
        return back();

    }
}
