<?php

namespace App\Http\Controllers;

use App\Http\Resources\Showcourse;
use Illuminate\Http\Request;
use DB;
use Schema;

class CourseController extends Controller
{
    public function course(){
        $courses = DB::table('course')->get();
        $filtered_courses = $courses->map(function ($item) {
            return collect($item)->except(['id', 'created_at', 'updated_at'])->all();
        });
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->toArray();
        return view('course',compact('courses','cousre_feild','category','filtered_courses'));
    }
}
