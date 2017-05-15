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
        $numberRatings = DB::table("ratings")->select("user")->distinct()->count();
        $noRating = $numberStudents - $numberRatings;

        $parameter = ["numberStudents"=>$numberStudents, "noRating"=>$noRating];

        return view("admin_dashboard", $parameter);
    }
}
