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
        DB::table('welcomes')->insert([
            'de' => str_random(50),
            'en' => str_random(50),
        ]);
    }
}
