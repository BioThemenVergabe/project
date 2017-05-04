<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 04.05.2017
 * Time: 21:11
 */
namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class studentController{

    public function showStudents(Request $request){
        $students = DB::table("users")->select('name','lastname', 'matrnr')->get();
        $parameters = ['students' => $students];
        return view('admin_studenten', $parameters);
    }
}
