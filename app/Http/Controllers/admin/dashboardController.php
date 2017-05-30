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
use Illuminate\Support\Facades\Hash;


class dashboardController
{

    public function showDashboard(Request $request)
    {
        $action = "noAction";
        if ($request->has('action')) {
            $action = $request->action;//nachdem löschen von Ratings oder dem Beenden der Wahl wird das entsprechende Modal  in der View geöffnet
        }
        $numberStudents = DB::table("users")->where("userlevel", 0)->count();
        $ratings = DB::table("ratings")->select("user")->distinct()->get();
        $numberRatings = sizeof($ratings);

        $noRating = $numberStudents - $numberRatings;
        $rated = false; //ob den Studenten bereits eine AG zugewiesen wurde
        $status = "open";
        $parameter = ["numberStudents" => $numberStudents, "noRating" => $noRating, "rated" => $rated, "status" => $status, "action" => $action];

        return view("admin_dashboard", $parameter);
    }

    public function checkAdmin(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObject = DB::table("users")->select("password")->where("userlevel", 1)->first();
        $hashedPassword = $hashedPasswordObject->password;

        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        $matches = Hash::check($passwort, $hashedPassword);
        if ($matches) {
            DB::table("ratings")->delete();
            DB::table("users")->delete();
        }

        //var_export konvertiert den boolean in einen String
        return var_export($matches, true);;
    }

    public function deleteRatings(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObject = DB::table("users")->select("password")->where("userlevel", 1)->first();
        $hashedPassword = $hashedPasswordObject->password;

        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        $matches = Hash::check($passwort, $hashedPassword);
        if ($matches) {
            DB::table("ratings")->delete();
        }

        return var_export($matches, true);;
    }
}
