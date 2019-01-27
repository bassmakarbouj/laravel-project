<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role=[
            $this->create(1 , 1),   
            $this->create(2 , 2),   
            $this->create(3 , 3),   
        ];

        DB::table('role_user')->insert($user_role);
    }

    protected function create($user_id , $role_id){
        return [
            'user_id' => $user_id,
            'role_id' => $role_id,
        ];
    }
}
