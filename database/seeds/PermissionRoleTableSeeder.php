<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permision_role = [
            $this->create(1 , 1),
            $this->create(2 , 1),
            $this->create(3 , 1),
            $this->create(4 , 1),
            $this->create(5 , 1),
            $this->create(6 , 1),
            $this->create(7 , 1),
            $this->create(8 , 1),
            $this->create(9 , 1),
            $this->create(10 , 1),
            $this->create(11 , 1),
            $this->create(12 , 1),
            $this->create(13 , 1),
            $this->create(14 , 1),
            $this->create(15 , 1),
            $this->create(16 , 1),

            $this->create(1 , 2 ),         
            $this->create(17 , 2 ),         
            $this->create(18 , 2 ),         
            $this->create(19 , 2 ),         
            $this->create(20 , 2 ),  

            $this->create(1 , 3 ),         
            $this->create(17 , 3 ),         
            $this->create(13 , 3 ),         
        ];

        DB::table('permission_role')->insert($permision_role);
        
    }

    protected function create($permision_id , $role_id){
        return [
            'permission_id' => $permision_id,
            'role_id' => $role_id,
        ];
    }
}
