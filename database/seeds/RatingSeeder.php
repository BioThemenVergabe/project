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

    public function createRandomRatings()
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

    public function createValideRatings()
    {
        $userIds = DB::table("users")->select("id")->where("userlevel", 0)->get();
        $agIds = DB::table("workgroups")->select("id")->get()->all();

        foreach ($userIds as $userId) {
            shuffle($agIds); //Reihenfolge zufällig mischen
            for ($i = 0; $i < sizeof($agIds); $i++) {
                //wenn noch kein rating vorhanden, dann eins erzeugen
                $rating = DB::table("ratings")->where([["user", $userId->id], ["workgroup", $agIds[$i]->id]])->get();
                if (sizeof($rating) == 0) {
                    if ($i < 10 && $i >= 0) {
                        $rate = 10 - $i;
                    } else {
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

    public function createRealRatings()
    {
        $probability = array(16, 59, 22, 12, 16, 15, 14, 44, 12, 53, 22, 47, 31, 13, 13, 19, 26, 43, 23, 18, 18, 26, 74, 17, 27); //durchschnittliche Zufriedenheit der vergangenen Reelen Wahl
        $sum = 0;
        foreach ($probability as $p) {
            $sum += $p;
        }
        $userIds = DB::table("users")->select("id")->where("userlevel", 0)->get();


        foreach ($userIds as $userId) {
            $agIds = DB::table("workgroups")->select("id")->get();
            $size = sizeof($agIds);
            for ($j = 10; $j > 0; $j--) {
                $random = rand(0, $sum);
                for ($i = 0; $i < $size; $i++) {
                    if (isset($agIds[$i])) {
                        $cumulated = $this->addUp($probability, $i);
                        if ($random <= $cumulated) {
                            DB::table('ratings')->insert([
                                'user' => $userId->id,
                                'workgroup' => $agIds[$i]->id,
                                "rating" => $j,
                            ]);
                            unset($agIds[$i]);
                            break;
                        }
                    }
                }
            }
            foreach ($agIds as $agId) {
                if (isset($agId)) {
                    DB::table('ratings')->insert([
                        'user' => $userId->id,
                        'workgroup' => $agId->id,
                        "rating" => 1,
                    ]);
                }
            }
        }

    }

    private
    function addUp($array, $index)
    {
        $sum = 0;
        for ($i = 0; $i <= $index; $i++) {
            $sum += $array[$i];
        }
        return $sum;
    }


    public
    function run()
    {
        //$this->createRandomRatings();
        $this->createValideRatings();
        //$this->createRealRatings();
    }
}
