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
        $parameter = ["numberStudents"=>$numberStudents];
        return view("admin_dashboard", $parameter);
    }
}
