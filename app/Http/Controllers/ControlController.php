<?php

namespace App\Http\Controllers;

use App\CategoryCourse;
use App\Http\Requests\CreateCategoryCourseRequest;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Course;
use Schema;
use App\Http\Requests\ShowControlWindowRequest;

class ControlController extends Controller
{
    /**
     * @api {get}  /control showControl
     * @apiGroup Control
     *
     * @apiSuccess (Success 200) courses Get all courses info
     * @apiSuccess (Success 200) cousre_feild Get courses table feild name
     * @apiSuccess (Success 200) category Get all category info
     * @apiSuccess (Success 200) category_feild Get category table feild name
     */
    public function showControl(){
        $courses = DB::table('course')->get()->all();
        $cousre_feild = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->all();
        $category_feild = Schema::getColumnListing('category_course');
        return [$courses , $cousre_feild , $category , $category_feild];
    }

    /**
     * @api {post} /createCourse  createCourse
     * @apigroup Control
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
     * @api {post} /createCategory  createCategory
     * @apigroup Control
     * @apiParam {object} request object array of  category info
     *
     * @apiSuccess (success 200) category Add category
     */
    public function createCategory(CreateCategoryCourseRequest $request){
        $category = new CategoryCourse;
        $category->name = $request->name;
        $category->save();
       return $category;
    }

    /**
     * @api {post} /editCategory editCategory
     * @apiGroup Control
     * @apiParam {object} request object array of category updating info
     * @apiParam {object} cat_id  array of category id & feild to update
     *
     * @apiSuccess (Success 200) cat_id updating category info
     * @apiReturn CategoryCourse
     */
    public function editCategory(Request $request ,CategoryCourse $cat_id){
        $cat_id->update($request->all());
        $cat_id->save();
        return $cat_id;
    }

    /**
     * @api {post} /editCourse editCourse
     * @apiGroup Control
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
     * @api {get} /deleteCategory/{cat_id} deleteCategory
     * @apiGroup Control
     * @apiParam {object} cat_id object array contain category id to delete
     *
     * @apiSuccess (Success 200)  cat_id delete category
     */
    public function deleteCategory(CategoryCourse $cat_id){
        $cat_id->delete();
        return $cat_id;

    }

    /**
     * @api {get} /deleteCourse/{course_id} deleteCourse
     * @apiGroup Control
     * @apiParam {object} course_id object array contain course id to delete
     *
     * @apiSuccess (Success 200)  course_id delete course
     */
    public function deleteCourse(Course $course_id){
        $course_id->delete();
        return $course_id;

    }

    /**
     * @api {post} /add_manager/{role}/{user} addManager
     * @apiGroup Control
     * @apiParam {object} role object array contain role id
     * @apiParam {object} user object array contain user id
     *
     * @apiSuccess (Success 200) user update user role
     */
    public function addManager(Role $role , User $user){
        $user->roles()->sync([$role->id]);
        return $user;
    }


    /**
     * @api {get} /show_student showStudent
     * @apiGroup Control
     *
     * @apiSuccess (Success 200) all_student show all student info
     */
    public function showStudent(){
        $student_role = DB::table('role_user')->where('role_id',3)->pluck('user_id')->toArray();
        $student = array_values($student_role);
        $all_student=DB::table('users')->whereIn('id',$student)->get();
        return $all_student;

    }


    /**
     * @api {post} /edit_profile/{id} editProfile
     * @apiGroup Control
     * @apiParam {object} request object array of user profile updating info
     * @apiParam {object} id  array contain user id & field to update
     *
     * @apiSuccess (Success 200) id  updating user info
     * @apiReturn User|string
     */
    public function editProfile(UpdateProfileRequest $request,User $id){
        $user = DB::table('users')->where('id',$id->id)->pluck('statue')->toArray();
        if($user[0] == 1){
            $id->update($request->all());
            if($request->hasFile('photo')){
                $allowedfileExtension = ['jpg', 'png'];
                $photo = $request->file('photo');
                $imagename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $checkimage = in_array($extension, $allowedfileExtension);
                if($checkimage){
                    $i =$request->photo;
                    $imagename = $i->store('photo');
                }
                $id->photo = $imagename;
            }
            $id->save();
            return $id;

        }
       else{
           return "This account is disable";
       }
    }

    /**
     * @api {get} /delete_student_account/{student} deleteStudent
     * @apiGroup Control
     * @apiParam {object} student object array contain student id to delete
     *
     * @apiSuccess (Success 200)  student delete student
     */
    public function deleteStudent(User $student){
        $student->delete();
        return $student;
    }

    /**
     * @api {get} /delete_manager_account/{manager} deleteManager
     * @apiGroup Control
     * @apiParam {object} manager object array contain manager id to delete
     *
     * @apiSuccess (Success 200)  manager delete manager
     */
    public function deleteManager(User $manager){
        $manager->delete();
        return $manager;
    }


//    public function editManager(UpdateProfileRequest $request,User $manager){
//        $manager->update($request->all());
//        if($request->hasFile('photo')){
//            $allowedfileExtension = ['jpg', 'png'];
//            $photo = $request->file('photo');
//            $imagename = $photo->getClientOriginalName();
//            $extension = $photo->getClientOriginalExtension();
//            $checkimage = in_array($extension, $allowedfileExtension);
//            if($checkimage){
//                $i =$request->photo;
//                $imagename = $i->store('photo');
//            }
//            $manager->photo = $imagename;
//        }
//        $manager->save();
//        return $manager;
//
//    }



}
