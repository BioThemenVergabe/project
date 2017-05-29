<?php

use Illuminate\Database\Seeder;

class WelcomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rndStringDE = "";
        for($i = 0; $i < 100; $i++) {
            $strLength = rand(3, 10);
            $rndStringDE = $rndStringDE . str_random($strLength) . " ";
        }

        $rndStringEN = "";
        for($i = 0; $i < 100; $i++) {
            $strLength = rand(3, 10);
            $rndStringEN = $rndStringDE . str_random($strLength) . " ";
        }

        DB::table('welcomes')->insert([
            'de' => $rndStringDE,
            'en' => $rndStringEN,
        ]);
    }
}
