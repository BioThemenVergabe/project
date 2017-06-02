<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(WorkgroupSeeder::class);
        $this->call(WelcomesTableSeeder::class);
        $this->call(RatingSeeder::class);
    }
}
