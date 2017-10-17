<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => "Alice",
            'email' => 'alice@gmail.com',
            'picture' => file_get_contents("/Users/cheekhong/Pictures/images.jpg"),
            'dob' => date('Y-m-d'),
            'gender' => 'F',
            'standard' => 'Degree',
            'remember_token' => str_random(10),
        ]);
    }
}
