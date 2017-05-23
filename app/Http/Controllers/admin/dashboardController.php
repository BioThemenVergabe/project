<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 06.05.2017
 * Time: 17:44
 */
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController
{

    public function showDashboard()
    {
        $numberStudents = DB::table("users")->where("userlevel",0)->count();
        $numberRatings = DB::statement('SELECT count(DISTINCT user) FROM ratings');

        $noRating = $numberStudents - $numberRatings;
        $rated = false; //ob den Studenten bereits eine AG zugewiesen wurde
        $status  = "open";
        $parameter = ["numberStudents"=>$numberStudents, "noRating"=>$noRating, "rated"=>$rated, "status"=>$status];

        return view("admin_dashboard", $parameter);
    }
}
