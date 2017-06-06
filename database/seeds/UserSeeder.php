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
            'name' => "Matthias",
            'lastname' => "Leopold",
            "matrnr" => "293005",
            "email" => "mat.leo@web.de",
            "password" => Hash::make("88888888"),
            "userlevel" => 1,
        ]);
        DB::table('users')->insert([
            'name' => "Anna",
            'lastname' => "Märkle",
            "matrnr" => "866079",
            "email" => "test@Email1.de",
            "password" => Hash::make("testPW1"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Anna",
            'lastname' => "Neuer",
            "matrnr" => "829541",
            "email" => "test@Email2.de",
            "password" => Hash::make("testPW2"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "annabel",
            'lastname' => "Burkard",
            "matrnr" => "790729",
            "email" => "test@Email3.de",
            "password" => Hash::make("testPW3"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Caroline",
            'lastname' => "Gruschel",
            "matrnr" => "798019",
            "email" => "test@Email4.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Chiara",
            'lastname' => "Stroncszek",
            "matrnr" => "837876",
            "email" => "test@Email5.de",
            "password" => Hash::make("testPW5"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Dennis",
            'lastname' => "Dembinski",
            "matrnr" => "791317",
            "email" => "test@Email6.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Erik",
            'lastname' => "Sontowski",
            "matrnr" => "791528",
            "email" => "test@Email7.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Javed",
            'lastname' => "Haroon",
            "matrnr" => "795414",
            "email" => "test@Email8.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Jonas",
            'lastname' => "Bleilevens",
            "matrnr" => "866439",
            "email" => "test@Email9.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Jovana Bozic",
            'lastname' => "Petkovic",
            "matrnr" => "809670",
            "email" => "test@Email10.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Konrad",
            'lastname' => "Burkard",
            "matrnr" => "809671",
            "email" => "test@Email11.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Manh Huv",
            'lastname' => "Nguyen",
            "matrnr" => "111111",
            "email" => "test@Email12.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Marcel",
            'lastname' => "Uhrig",
            "matrnr" => "891235",
            "email" => "test@Email13.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Sabrina",
            'lastname' => "Kalmbach",
            "matrnr" => "789112",
            "email" => "test@Email14.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Sandeep",
            'lastname' => "Shrestha",
            "matrnr" => "16777215",
            "email" => "test@Email15.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Siad",
            'lastname' => "Kadura",
            "matrnr" => "865438",
            "email" => "test@Email16.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Silvio",
            'lastname' => "Widmer",
            "matrnr" => "854583",
            "email" => "test@Email17.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
        DB::table('users')->insert([
            'name' => "Suju",
            'lastname' => "Acharya",
            "matrnr" => "123456",
            "email" => "test@Email18.de",
            "password" => Hash::make("testPW4"),
            "userlevel" => 0,
        ]);
    }
}
