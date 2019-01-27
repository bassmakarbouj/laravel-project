<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Schema;

class NewCourseController extends Controller
{
    public function newCourse(){
        $courses = DB::table('course')->get()->all();
        $cousre_feild = Schema::getColumnListing('course');
        return view('new_course',compact('courses','cousre_feild'));
    }
}
