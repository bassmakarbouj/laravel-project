<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CourseCategoryController extends Controller
{
    public function courseCategory(){
        $category = DB::table('category_course')->get()->all();
        return view('course_category', compact('category'));
    }


}
