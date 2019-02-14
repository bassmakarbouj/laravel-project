<?php

namespace App\Http\Controllers;

use App\Http\Resources\Showcourse;
use Illuminate\Http\Request;
use DB;
use Schema;
use App\Http\Requests\CreateCourseRequest;
use App\Course;

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

    /**
     * @api {get} /new_course newCourse
     * @apiGroup Course
     *
     * @apiSuccess  (Success 200) courses get new course info
     * @return mixed
     */
    public function newCourse(){
        $courses = DB::table('course')->where('new',1)->get();
        return $courses;
    }

    /**
     * @api {post} /createCourse  createCourse
     * @apigroup Course
     * @apiParam {object} request object array of course info
     *
     * @apiSuccess (success 200) course Add course  with image & files
     *
     */
    public function createCourse(CreateCourseRequest $request){
        $course = new Course($request->validated());
        if(($request->hasFile('course_files')) || ($request->hasFile('course_image'))) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('course_files');
            $image =$request->file('course_image');
            if ($files) {
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);
                    if ($check) {
                        foreach ($request->course_files as $file) {
                            $filename= $file->store('course_files');
                            $course->course_files = $filename;
                        }
                    }
                }
            }
            if ($image) {
                $photo = $request->file('course_image');
                $imagename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $checkimage = in_array($extension, $allowedfileExtension);
                if ($checkimage) {
                    $i = $request->course_image;
                    $imagename = $i->store('course_image');
                }
                $course->course_image = $imagename;
            }
        }
        $course->save();
        return $course;
    }

    /**
     * @api {post} editCourse/{course_id} editCourse
     * @apiGroup Course
     * @apiParam {object} request object array of course updating info
     * @apiParam {object} course_id  array contain course id & feild to update
     *
     * @apiSuccess (Success 200) course_id updating course info
     * @apiReturn Course
     */
    public function editCourse(Request $request ,Course $course_id){
        $course_id->update($request->all());
        return $course_id;
    }

    /**
     * @api {get} /deleteCourse/{course_id} deleteCourse
     * @apiGroup Course
     * @apiParam {object} course_id object array contain course id to delete
     *
     * @apiSuccess (Success 200)  course_id delete course
     */
    public function deleteCourse(Course $course_id){
        $course_id->delete();
        return $course_id;

    }

}
