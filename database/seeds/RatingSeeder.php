<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //für alle angemeldeten user, alle AGs bewerten

    public function createRandomRatings(){
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

    public function createValideRatings(){
        $userIds = DB::table("users")->select("id")->where("userlevel", 0)->get();
        $agIds = DB::table("workgroups")->select("id")->get()->all();

        foreach ($userIds as $userId) {
            shuffle($agIds); //Reihenfolge zufällig mischen
            for($i=0; $i<sizeof($agIds);$i++) {
                //wenn noch kein rating vorhanden, dann eins erzeugen
                $rating = DB::table("ratings")->where([["user", $userId->id], ["workgroup", $agIds[$i]->id]])->get();
                if (sizeof($rating) == 0) {
                    if($i<10 && $i>=0){
                        $rate = $i+1;
                    }else{
                        $rate = 1;
                    }
                    DB::table('ratings')->insert([
                        'user' => $userId->id,
                        'workgroup' => $agIds[$i]->id,
                        "rating" => $rate,
                    ]);
                }
            }
        }
    }


    public function run()
    {
        //$this->createRandomRatings();
        $this->createValideRatings();

    }
}
