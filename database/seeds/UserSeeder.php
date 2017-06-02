<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            "email" => "test@Email1.de",
            "password" => Hash::make("testPW1"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "testName2",
            'lastname' => "testLastname2",
            "matrnr" => "123457",
            "email" => "test@Email2.de",
            "password" => Hash::make("testPW2"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "testName3",
            'lastname' => "testLastname3",
            "matrnr" => "234567",
            "email" => "test@Email3.de",
            "password" => Hash::make("testPW3"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "testName4",
            'lastname' => "testLastname4",
            "matrnr" => "345678",
            "email" => "test@Email5.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
    }
}
