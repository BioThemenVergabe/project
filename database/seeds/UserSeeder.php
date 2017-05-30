<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "testName1",
            'lastname' => "testLastname1",
            "matrnr" => "012345",
            "email" => "testEmail1",
            "password" => "testPW1",
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "testName2",
            'lastname' => "testLastname2",
            "matrnr" => "123457",
            "email" => "testEmail2",
            "password" => "testPW2",
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "testName3",
            'lastname' => "testLastname3",
            "matrnr" => "234567",
            "email" => "testEmail3",
            "password" => "testPW3",
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "testName4",
            'lastname' => "testLastname4",
            "matrnr" => "345678",
            "email" => "testEmail4",
            "password" => "testPW4",
            "userlevel" => 0,
        ]);
    }
}
