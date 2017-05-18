<?php

use Illuminate\Database\Seeder;

class WorkgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workgroups')->insert([
            'name' => "Name1",
            'groupLeader' => "Leader1",
            "spots" => 7,
            "date" => "3.Quartal",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Name2",
            'groupLeader' => "Leader2",
            "spots" => 4,
            "date" => "1.Quartal",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Name3",
            'groupLeader' => "Leader3",
            "spots" => 12,
            "date" => "Anfang Mai",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Name4",
            'groupLeader' => "Leader4",
            "spots" => 3,
            "date" => "3.Quartal",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Name5",
            'groupLeader' => "Leader5",
            "spots" => 8,
            "date" => "Anfang Semester",
        ]);
    }
}
