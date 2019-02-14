<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CategoryCourse;
use App\Http\Requests\CreateCategoryCourseRequest;

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

    /**
     * @api {post} /create_course_category  createCourseCategory
     * @apigroup CourseCategory
     * @apiParam {object} request object array of  category info
     *
     * @apiSuccess (success 200) category Add category
     */
    public function createCourseCategory(CreateCategoryCourseRequest $request){
        $category = new CategoryCourse;
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    /**
     * @api {post} edit_course_category/{cat_id} editCourseCategory
     * @apiGroup CourseCategory
     * @apiParam {object} request object array of category updating info
     * @apiParam {object} cat_id  array of category id & field to update
     *
     * @apiSuccess (Success 200) cat_id updating category info
     * @apiReturn CategoryCourse
     */
    public function editCourseCategory(Request $request ,CategoryCourse $cat_id){
        $cat_id->update($request->all());
        $cat_id->save();
        return $cat_id;
    }



    /**
     * @api {get} /delete_course_category/{cat_id} deleteCourseCategory
     * @apiGroup CourseCategory
     * @apiParam {object} cat_id object array contain category id to delete
     *
     * @apiSuccess (Success 200)  cat_id delete category
     */
    public function deleteCourseCategory(CategoryCourse $cat_id){
        $cat_id->delete();
        return $cat_id;

    }



}
