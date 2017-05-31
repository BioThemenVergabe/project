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
        //$noRating = 0;
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

    public function startAlgo()
    {
        $students = DB::table("users")->get();
        //return print_r(array_keys($students->all()), true);
        //für alle Studenten ein Attribut "priorität" mit 0 setzen
        foreach ($students as $student) {
            $student->priorität = 0;
        }

        //$i ist Laufvariable für den Wert eines rating
        for ($i = 1; $i <= 10; $i++) {
            //Alle Bewertungen mit Präferenz $i raussuchen
            $präferenzRatings = array();
            foreach ($students as $student) {
                $ratings = DB::table("ratings")->where("user", $student->id)->get();
                foreach ($ratings as $rating) {
                    if ($rating->rating == $i) {
                        $präferenzRatings[$student->id] = $rating->workgroup;
                    }
                }
            }
            //Nach AGs sortieren
            foreach (array_values($präferenzRatings) as $workgroup) {
                //Alle Studenten, welche diese AG mit $i bewertet haben
                $ratedStudents = array_keys($präferenzRatings, $workgroup);


                $plätzeObject = DB::table("workgroups")->select("spots")->where("id", $workgroup)->get();
                $plätze = $plätzeObject[0]->spots;
                //Falls Anzahl der Bewertungen <= Plätze-> alle zuweisen
                if (sizeof($ratedStudents) <= $plätze) {
                    foreach ($ratedStudents as $ratedStudent) {
                        //Spalte in DB aktualisieren
                        DB::table("users")->where("id", "$ratedStudent")->update(["zugewiesen"=> $workgroup]);
                        //und den studenten aus Algorithmus entfernen
                        $index = -1; //der index des studenten in $students
                        foreach ($students as $student){
                            if($student->id==$ratedStudent){
                                $index = key($student);
                            }
                        }
                        $students->forget($index);
                    }
                } //ansonsten Studenten mit höchster Priorität zuweisen. Danach AG mit zufälligen Studenten auffüllen
                else {
                    //alle Objecte von den passenden Studenten
                    $ratedStudentsObject = array();
                    foreach ($students as $student) {
                        foreach ($ratedStudents as $ratedStudent) {
                            //passenden studenten gefunden
                            if ($student->id == $ratedStudent) {
                                array_push($ratedStudentsObject, $student);
                            }
                        }
                    }

                    $maxPrio = max(array_column($ratedStudentsObject, "priorität"));
                    //solange Studenten der höchsten Priorität zuweisen, bis voll
                    while ($plätze > 0) {
                        foreach ($ratedStudentsObject as $ratedStudentObject) {
                            if ($ratedStudentObject->priorität == $maxPrio) {
                                //Spalte in DB aktualisieren
                                DB::table("users")->where("id", $ratedStudentObject->id)->update(["zugewiesen", $workgroup]);
                                //und den studenten aus Algorithmus entfernen
                                $index = -1; //der index des studenten in $students
                                foreach ($students as $student){
                                    if($student->id==$ratedStudentObject->id){
                                        $index = key($student);
                                    }
                                }
                                $students->forget($index);
                                $ratedStudentsObject->forget(key($ratedStudentObject));
                                $maxPrio = max(array_column($ratedStudentsObject, "priorität"));
                                $plätze--;
                            }
                        }
                    }
                    //Studenten, welche nicht zugewiesen wurden, das Attribut Priorität um 1 erhöhen
                    if(sizeof($ratedStudentsObject)>0){
                        foreach($ratedStudentsObject as $ratedStudentObject){
                            foreach($students as $student){
                                if($ratedStudentObject->id == $student->id){
                                    $student->priorität++;
                                }
                            }
                        }
                    }
                }

            }
        }
        return "true";
    }
}
