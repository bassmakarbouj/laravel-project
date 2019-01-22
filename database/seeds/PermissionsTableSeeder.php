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
            $this->create('update_profile', 'update profile', ''),
            
            $this->create('store_course', 'Store Course', ''),
            $this->create('update_course', 'Update Course', ''),
            $this->create('delete_course', 'Delete Course', ''),
            $this->create('store_file_course', 'store file course', ''),

            $this->create('add_admin_manager', 'Add Admin and Manager', ''),
            $this->create('update_admin_manager', 'Add Admin and Manager', ''),
            $this->create('delete_admin_manager', 'Add Admin and Manager', ''),

            $this->create('comment_student', 'comment student', ''),
            $this->create('update_student', 'update student', ''),
            $this->create('delete_student', 'delete student', ''),
            $this->create('show_student_statue', 'delete student', ''),

            $this->create('create_course_category', 'create course category', ''),
            $this->create('update_course_category', 'update course category', ''),
            $this->create('delete_course_category', 'delete course category', ''),

            $this->create('show_course_form', 'show course form', ''),
            $this->create('accept_course_form', 'accept course form', ''),
            $this->create('ignore_course_form', 'ignore course form', ''),
            $this->create('comment_course_form', 'comment course form', ''),
        ];

        DB::table('permissions')->insert($permissions);

        // $user->can('store_course');
    }

    protected function create($name, $display_name, $description) {
        return [
            'name' => $name,
            'display_name' => $display_name,
            'description' => $description,
        ];
    }
}
