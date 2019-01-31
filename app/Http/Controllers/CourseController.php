<?php

namespace App\Http\Controllers;

use App\Http\Resources\Showcourse;
use Illuminate\Http\Request;
use DB;
use Schema;

class CourseController extends Controller
{
    /**
     * @api {get} /course course
     * @apiGroup Course
     *
     * @apiSuccess (Success 200) course get all course info
     */
    public function course(){
        $courses = DB::table('course')->get();
        $filtered_courses = $courses->map(function ($item) {
            return collect($item)->except(['id', 'created_at', 'updated_at'])->all();
        });
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->toArray();
        return [$courses];
    }

    /**
     * @api {get} /course/{course_id} oneCourse
     * @apiGroup Course
     * @apiParam {integer} course_id course id
     *
     * @apiSuccess (Success 200) one_course get a specifec course info
     * @return
     */
    public function oneCourse($course_id){
        $one_course = DB::table('course')->where('id',$course_id)->get();
        return $one_course;
    }
}
