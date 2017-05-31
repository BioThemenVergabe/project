<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //für alle angemeldeten user, alle AGs bewerten
    public function run()
    {
        $userIds = DB::table("users")->select("id")->where("userlevel", 0)->get();
        $agIds = DB::table("workgroups")->select("id")->get();

        foreach ($userIds as $userId) {
            foreach ($agIds as $agId) {
                //wenn noch kein rating vorhanden, dann eins erzeugen
                $rating = DB::table("ratings")->where([["user", $userId->id], ["workgroup", $agId->id]])->get();
                if (sizeof($rating) == 0) {
                    DB::table('ratings')->insert([
                        'user' => $userId->id,
                        'workgroup' => $agId->id,
                        "rating" => rand(1, 10),
                    ]);
                }
            }
        }
    }
}
