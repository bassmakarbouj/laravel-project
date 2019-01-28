<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Schema;

class NewCourseController extends Controller
{
    public function newCourse(){
        $courses = DB::table('course')->where('new',1)->get();
        return $courses;
    }
}
