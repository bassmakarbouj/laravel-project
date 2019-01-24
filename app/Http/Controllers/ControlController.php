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
//         dd($courses[0]);
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->all();
        $category_feild = Schema::getColumnListing('category_course');
//        dd($courses);
        return view('control', compact('category_feild','cousre_feild' ,'category' ,'courses'));
    }

    public function createCourse(CreateCourseRequest $request){
        $course = new Course($request->validated());
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
        $cat_id->update($request->all());
        return back();
    }

    public function editCourse(Request $request ,Course $course_id){
        dd($request->all());
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
