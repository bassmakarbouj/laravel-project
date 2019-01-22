<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use DB; 
use App\Course;
use Schema;

class ControlController extends Controller
{
    public function control(){
        if((Auth::user()) && (Auth::user()->role==3)){
            return redirect('/');
        }
        // $column = DB::table('course')->get();
        $column = Schema::getColumnListing('course');
        // $course = new Course;
        // $column = $course->getTableColumns();
        // dd($column);
        return view('control', compact('column'));
    }

    public function createCourse(CreateCourseRequest $request){
        $course = new Course;
        $course->name = $request->name;
        $course->save();

       return view('profile');
    }
}
