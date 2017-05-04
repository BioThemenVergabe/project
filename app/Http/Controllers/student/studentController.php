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

    public function showStudents(){
        $students = DB::table("users")->select('id','name','lastname', 'matrnr', 'email')->get();
        $parameters = ['students' => $students];
        return view('admin_studenten', $parameters);
    }

    public function editStudent(Request $request){
        $name = $request->name;
        $nameArray = explode(' ', $name);
        $vorname = $nameArray[0];
        $nachname = $nameArray[1];
        $parameters = ['vorname'=>$vorname,'nachname'=>$nachname,'email'=>$request->email,'matrnr'=>$request->matrnr,'id'=>$request->id];
        return view('admin_studenten_bearbeiten', $parameters);
    }

    function saveStudent(Request $request)
    {
        $student = new studentModel($request->id,$request->name, $request->lastname, $request->matnr, $request->email);

        DB::table("users")->where('id', $student->getId())->update(['name' => $student->getName(),'lastname' => $student->getLastname(),'matrnr' => $student->getMatrnr(),'email' => $student->getEmail()]);


        return $this->showStudents();
    }
}