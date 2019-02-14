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
     * @api {get}  /show_all showAll
     * @apiGroup Control
     *
     * @apiSuccess (Success 200) courses Get all courses info
     * @apiSuccess (Success 200) course_field Get courses table field name
     * @apiSuccess (Success 200) category Get all category info
     * @apiSuccess (Success 200) category_field Get category table field name
     */
    public function showAll(){
        $courses = DB::table('course')->get()->all();
        $course_field = Schema::getColumnListing('course');
        $category = DB::table('category_course')->get()->all();
        $category_feild = Schema::getColumnListing('category_course');
        return [$courses , $course_field , $category , $category_feild];
    }





    /**
     * @api {get} /add_manager/{role}/{user} addManager
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
     * @api {get} /student student
     * @apiGroup Control
     *
     * @apiSuccess (Success 200) all_student show all student info
     */
    public function student(){
        $student_role = DB::table('role_user')->where('role_id',3)->pluck('user_id')->toArray();
        $student = array_values($student_role);
        $all_student=DB::table('users')->whereIn('id',$student)->get();
        return $all_student;

    }


    /**
     * @api {post} /edit_user_profile/{user_id} editUserProfile
     * @apiGroup Control
     * @apiParam {object} request object array of user profile updating info
     * @apiParam {object} user_id  array contain user id & field to update
     *
     * @apiSuccess (Success 200) user_id  updating user info
     * @apiReturn User|string
     */
    public function editUserProfile(UpdateProfileRequest $request,User $user_id){
        $user_statue = DB::table('users')->where('id',$user_id->id)->pluck('statue')->toArray();
        if($user_statue[0] == 1){
            $user_id->update($request->all());
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
                $user_id->photo = $imagename;
            }
            $user_id->save();
            return $user_id;

        }
       else{
           return "This account is disable";
       }
    }

    /**
     * @api {get} /delete_student_account/{student_id} deleteStudentAccount
     * @apiGroup Control
     * @apiParam {object} student_id object array contain student id to delete
     *
     * @apiSuccess (Success 200)  student_id delete student
     */
    public function deleteStudentAccount(User $student_id){
        $role = DB::table('role_user')->where('user_id',$student_id->id)->pluck('role_id')->toArray();
        if($role[0] == 3) {
            $student_id->delete();
            return $student_id;
        }
    }

    /**
     * @api {get} /delete_manager_account/{manager_id} deleteManagerAccount
     * @apiGroup Control
     * @apiParam {object} manager_id object array contain manager id to delete
     *
     * @apiSuccess (Success 200)  manager_id delete manager
     */
    public function deleteManagerAccount(User $manager_id){
        $role = DB::table('role_user')->where('user_id',$manager_id->id)->pluck('role_id')->toArray();
        if($role[0] == 2){
            $manager_id->delete();
            return $manager_id;
        }

    }

}
