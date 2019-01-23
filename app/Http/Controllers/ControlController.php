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
       
         $courses = DB::table('course')->get();
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->all();
        $category_feild = Schema::getColumnListing('category_course');
//        dd($courses);
        return view('control', compact('category_feild','cousre_feild' ,'category' ,'courses'));
    }

    public function createCourse(CreateCourseRequest $request){
        $course = new Course;
//        $course->name = $request->name;
//        $course->category_id = $request->category;
        $course->fill($request->validated());
        $course->save();
        $courses = DB::table('course')->get();
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->all();
        $category_feild = Schema::getColumnListing('category_course');
        return view('control', compact('category_feild','cousre_feild' ,'category' , 'courses'));


    }

    public function createCategory(CreateCategoryCourseRequest $request){
        $category = new CategoryCourse;

        $category->name = $request->name;

        $category->save();

       return redirect("control");
    }
}
