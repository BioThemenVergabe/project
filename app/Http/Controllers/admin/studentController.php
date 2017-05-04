<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 04.05.2017
 * Time: 21:11
 */
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class studentController{


    //alle Studenten anzeigen. Admin Accounts werden nicht angezeigt!
    public function showStudents(){
        $students = DB::table("users")->where('userlevel',0)->select('id','name','lastname', 'matrnr', 'email')->get();
        $parameters = ['students' => $students];
        return view('admin_studenten', $parameters);
    }

    //die _bearbeiten seite wird mit den Parametern des angeklickten Studenten aufgerufen.
    public function editStudent(Request $request){
        $name = $request->name;
        $nameArray = explode(' ', $name);
        $vorname = $nameArray[0];
        $nachname = $nameArray[1];
        $parameters = ['vorname'=>$vorname,'nachname'=>$nachname,'email'=>$request->email,'matrnr'=>$request->matrnr,'id'=>$request->id];
        return view('admin_studenten_bearbeiten', $parameters);
    }

    //nachdem auf _bearbeiten die Daten des Studenten bearbeitet wurden, werden sie gesichert, und man wird auf _studenten zurückgeleitet
    function saveStudent(Request $request)
    {
        $student = new studentModel($request->id,$request->name, $request->lastname, $request->matnr, $request->email);

        DB::table("users")->where('id', $student->getId())->update(['name' => $student->getName(),'lastname' => $student->getLastname(),'matrnr' => $student->getMatrnr(),'email' => $student->getEmail()]);

        return $this->showStudents();
    }

    //nachdem das Löschen bestätigt wurde, wird der ausgewählte student hier aus der  DB gelöscht. Der nutzer wird auf _studenten zurückgeleitet
    function deleteStudent(Request $request){
        DB::table("users")->where('matrnr',$request->matrnr)->delete();

        return $this->showStudents();
    }
}