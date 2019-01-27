<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            $this->create('Bassma Admin' , 'bassma222k@gmail.com' , '123456789'),
            $this->create('Bassma Trainer' , 'bassma222@gmail.com' , '123456789'),
            $this->create('Bassma Student' , 'bassma@gmail.com' , '123456789'),
        ];

        DB::table('users')->insert($user);
        
    }

    protected function create($name , $email , $password ){
        return[
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ];
    }
}
