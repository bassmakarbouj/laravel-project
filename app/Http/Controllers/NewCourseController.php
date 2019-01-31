<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Schema;

class NewCourseController extends Controller
{
    /**
     * @api {get} /new_course newCourse
     * @apiGroup NewCourse
     *
     * @apiSuccess  (Success 200) courses get new course info
     * @return mixed
     */
    public function newCourse(){
        $courses = DB::table('course')->where('new',1)->get();
        return $courses;
    }
}
