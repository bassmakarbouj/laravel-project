<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CourseCategoryController extends Controller
{
    /**
     * @api {get} /course_category courseCategory
     * @apiGroup CourseCategory
     *
     * @apiSuccess (Success 200) category get all category info
     */
    public function courseCategory(){
        $category = DB::table('category_course')->get()->all();
        return $category;
    }


}
