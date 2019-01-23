<?php

use Illuminate\Database\Seeder;
// use DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            $this->create('update_profile', 'update profile', ''), //1
            
            $this->create('store_course', 'Store Course', ''), //2
            $this->create('update_course', 'Update Course', ''), //3
            $this->create('delete_course', 'Delete Course', ''), //4
            $this->create('store_file_course', 'store file course', ''),  //5

            $this->create('add_admin_manager', 'Add Admin and Manager', ''),  //6 
            $this->create('update_admin_manager', 'Add Admin and Manager', ''),  //7
            $this->create('delete_admin_manager', 'Add Admin and Manager', ''),  //8
            $this->create('comment_admin_manager', 'Add Admin and Manager', ''),  //9

            $this->create('comment_student', 'comment student', ''),  //10
            $this->create('update_student', 'update student', ''),  //11 
            $this->create('delete_student', 'delete student', ''),  //12
            $this->create('show_student_statue', 'delete student', ''),  //13
 
            $this->create('create_course_category', 'create course category', ''),  //14
            $this->create('update_course_category', 'update course category', ''), //15
            $this->create('delete_course_category', 'delete course category', ''), //16

            $this->create('show_course_form', 'show course form', ''),  //17
            $this->create('accept_course_form', 'accept course form', ''),  //18
            $this->create('ignore_course_form', 'ignore course form', ''),  //19
            $this->create('comment_course_form', 'comment course form', ''),  //20 
        ];

        DB::table('permissions')->insert($permissions);

    }

    protected function create($name, $display_name, $description) {
        return [
            'name' => $name,
            'display_name' => $display_name,
            'description' => $description,
        ];
    }
}
