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

    //die admin_studenten_bearbeiten seite wird mit den Parametern des angeklickten Studenten aufgerufen.
    public function editStudent(Request $request){
        $studentArray = DB::table("users")->where('id',$request->id)->select('id','name','lastname', 'matrnr', 'email', 'created_at', 'updated_at')->get();
        $student = $studentArray[0];
        $parameters = ['id'=>$student->id,'vorname'=>$student->name,'nachname'=>$student->lastname,'email'=>$student->email,'matrnr'=>$student->matrnr,'änderung' =>$student->updated_at,'registrierung' =>$student->created_at,];
        return view('admin_studenten_bearbeiten', $parameters);
    }

    //nachdem auf _bearbeiten die Daten des Studenten bearbeitet wurden, werden sie gesichert, und man wird auf admin_studenten zurückgeleitet
    function saveStudent(Request $request)
    {
        $student = new studentModel($request->id,$request->name, $request->lastname, $request->matnr, $request->email);

        DB::table("users")->where('id', $student->getId())->update(['name' => $student->getName(),'lastname' => $student->getLastname(),'matrnr' => $student->getMatrnr(),'email' => $student->getEmail()]);

        return $this->showStudents();
    }

    //nachdem das Löschen bestätigt wurde, wird der ausgewählte student hier aus der  DB gelöscht. Der nutzer wird auf admin_studenten zurückgeleitet
    function deleteStudent(Request $request){
        DB::table("users")->where('matrnr',$request->matrnr)->delete();

        return $this->showStudents();
    }
}