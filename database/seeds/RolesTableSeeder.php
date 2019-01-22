<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[ 
            $this->create('admin' , 'Admin' , 'Admin'),
            $this->create('trainer' , 'Trainer' , 'Trainer'),
            $this->create('user' , 'User' , 'User'),

        ];

        DB::table('roles')->insert($roles);
    }

    protected function create($name , $display_name , $description){
        return [
            'name' => $name,
            'display_name' => $display_name,
            'description' => $description,
        ];
    }
}
