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
use Illuminate\Support\Facades\Log;
use Excel;


class dashboardController
{
    //zeigt beim aufrufen des Dashboards den aktuellen Status der Wahl und das Dashboard(Wahlmenü) für Admin
    public function showDashboard(Request $request)
    {
        $action = "noAction";
        if ($request->has('action')) {
            $action = $request->action;//Wenn gerade eine action erfolgt ist, wird das entsprechende Modal  in der View geöffnet
        }

        $numberStudents = DB::table("users")->where("userlevel", 0)->count();
        $ratings = DB::table("ratings")->select("user")->distinct()->get();
        $numberRatings = sizeof($ratings);
        $noRating = $numberStudents - $numberRatings;
        $notRatedStudents = DB::table("users")->leftJoin("ratings", "users.id", "=", "ratings.user")->where("userlevel",0)->whereNull('ratings.user')->select("users.*")->distinct()->get();

        $zugewieseneStudenten = DB::table("users")->whereNotNull("zugewiesen")->count();
        if ($zugewieseneStudenten == 0) {
            $rated = false; //ob den Studenten bereits eine AG zugewiesen wurde
        } else {
            $rated = true;
        }
        $opened = DB::table("options")->select("opened")->get()[0]->opened;
        if ($opened) {
            $status = "open";
        } else {
            $status = "closed";
        }

        $welcomeTextDE = DB::table("options")->select("welcomeDE")->first();
        $welcomeTextEN = DB::table("options")->select("welcomeEN")->first();

        $parameter = ["numberStudents" => $numberStudents, "noRating" => $noRating, "rated" => $rated, "status" => $status,
            "action" => $action, "welcomeDE" => $welcomeTextDE->welcomeDE, "welcomeEN" => $welcomeTextEN->welcomeEN, "notRatedStudents" =>$notRatedStudents];

        return view("admin_dashboard", $parameter);
    }

    //beendet Wahlgang: löscht alle Ratings und alle User. Danach sind nur noch Options und AGs in der DB
    public function checkAdmin(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObject = DB::table("users")->select("password")->where("userlevel", 1)->first();
        $hashedPassword = $hashedPasswordObject->password;

        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        $matches = Hash::check($passwort, $hashedPassword);
        if ($matches) {
            DB::table("ratings")->delete();
            DB::table("users")->where("userlevel", 0)->delete();
        }

        //var_export konvertiert den boolean in einen String
        return var_export($matches, true);;
    }

    //löscht alle zugewiesenen AGs von den Studenten und zusätzlich alle abgegebenen Ratings
    public function deleteRatings(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObject = DB::table("users")->select("password")->where("userlevel", 1)->first();
        $hashedPassword = $hashedPasswordObject->password;

        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        $matches = Hash::check($passwort, $hashedPassword);
        if ($matches) {
            DB::table("ratings")->delete();
            DB::table("users")->where("userlevel", 0)->update(["zugewiesen" => NULL]);

        }

        return var_export($matches, true);;
    }

    //löscht alle zugewiesenen AGs von den Studenten
    public function deleteAssignments(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObject = DB::table("users")->select("password")->where("userlevel", 1)->first();
        $hashedPassword = $hashedPasswordObject->password;

        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        $matches = Hash::check($passwort, $hashedPassword);
        if ($matches) {
            DB::table("users")->where("userlevel", 0)->update(["zugewiesen" => NULL]);
        }
        return var_export($matches, true);;
    }

    public function startAlgo()
    {
        //falls schon zuweisungen existieren, diese löschen.
        DB::table("users")->where("userlevel", 0)->update(["zugewiesen" => NULL]);

        $students = DB::table("users")->where("userlevel", 0)->get();
        $anzahlStudents = sizeof($students);
        //für alle Studenten ein Attribut "priorität" mit 0 setzen
        foreach ($students as $student) {
            $student->priorität = 0;
        }

        //$i ist Laufvariable für den Wert eines rating
        for ($i = 10; $i >= 1; $i--) {
            //Alle Bewertungen mit Präferenz $i raussuchen
            $präferenzRatings = array();//Array voll mit, userid=>workgroupid, wobei der user die workgroup mit $i bewertet hat
            foreach ($students as $student) {
                $ratings = DB::table("ratings")->where("user", $student->id)->get();
                foreach ($ratings as $rating) {
                    if ($rating->rating == $i) {
                        $präferenzRatings[$student->id] = $rating->workgroup;
                    }
                }
            }
            //Log::info("PräferenzRatings: ".print_r($präferenzRatings,true). "\n");

            //Nach AGs sortieren
            $workgroups = array_unique(array_values($präferenzRatings));//Array aller AGs, jede AG nur einmal vorhanden
            $workgroups = $this->orderBySpots($workgroups);//sortiert die AGs absteigend nach Anzahl Plätzen -> zuerst wird die AG mit den meisten Plätzen gefüllt
            foreach ($workgroups as $workgroup) {
                //Alle Studenten, welche diese AG mit $i bewertet haben
                $ratedStudents = array_keys($präferenzRatings, $workgroup);//gibt alle Studenten, die $workgroup mit $i bewertet haben zurück

                $plätzeObject = DB::table("workgroups")->select("spots")->where("id", $workgroup)->get();
                $plätzeGesamt = $plätzeObject[0]->spots;
                $plätzeBelegt = DB::table("workgroups")
                    ->leftJoin("users", "workgroups.id", "=", "users.zugewiesen")
                    ->select(DB::raw('COUNT(zugewiesen) as belegt'))
                    ->where("workgroups.id", $workgroup)
                    ->groupBy('workgroups.name')
                    ->get()[0]->belegt;
                //Log::info("---------------Die AG:".$workgroup ." wurde bereits belegt von ".$plätzeBelegt." Studenten");
                $plätze = $plätzeGesamt - $plätzeBelegt;

                //Falls Anzahl der Bewertungen <= Plätze-> alle zuweisen
                if (sizeof($ratedStudents) <= $plätze) {
                    foreach ($ratedStudents as $ratedStudent) {
                        //Spalte in DB aktualisieren
                        DB::table("users")->where("id", "$ratedStudent")->update(["zugewiesen" => $workgroup]);
                        //Log::info('Dem Studenten: ' . $ratedStudent ." wurde die Gruppe ".$workgroup." zugewiesen. Bewertung=".$i. "\n");
                        //und den studenten aus Algorithmus entfernen
                        $index = -1; //der index des studenten in $students
                        for ($j = 0; $j < $anzahlStudents; $j++) {
                            //Log::info('Neue Iteration:' . $j . "\n");
                            if (isset($students[$j])) {
                                if ($students[$j]->id == $ratedStudent) {
                                    $index = $j;
                                    //Log::info('Found the student:' . $ratedStudent . "\n");
                                    break;
                                }
                            }
                        }
                        $students->forget($index);
                        //Log::info('Forgot the student:' . $ratedStudent .". Es sind noch ".sizeof($students). " zu verteilen \n");
                        //Log::info(print_r($students,true). "\n");
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
                    foreach ($ratedStudentsObject as $ratedStudentObject) {
                        if ($plätze == 0) {
                            break;
                        }
                        if ($ratedStudentObject->priorität == $maxPrio) {
                            //Spalte in DB aktualisieren
                            DB::table("users")->where("id", $ratedStudentObject->id)->update(["zugewiesen" => $workgroup]);
                            //Log::info('--ELSE: Dem Studenten: ' . $ratedStudentObject->id ." wurde die Gruppe ".$workgroup." zugewiesen. Bewertung=".$i. "\n");
                            //und den studenten aus Algorithmus entfernen
                            $index = -1; //der index des studenten in $students
                            for ($j = 0; $j < $anzahlStudents; $j++) {
                                if (isset($students[$j])) {
                                    if ($students[$j]->id == $ratedStudentObject->id) {
                                        $index = $j;
                                        break;
                                    }
                                }
                            }
                            $students->forget($index);
                            unset($ratedStudentsObject[key($ratedStudentsObject)]);
                            //Log::info('Forgot the student:' . $ratedStudentObject->id .". Es sind noch ".sizeof($students). " zu verteilen \n");
                            $maxPrio = max(array_column($ratedStudentsObject, "priorität"));
                            $plätze--;
                        }
                    }
                    //Studenten, welche nicht zugewiesen wurden, das Attribut Priorität um 1 erhöhen
                    if (sizeof($ratedStudentsObject) > 0) {
                        foreach ($ratedStudentsObject as $ratedStudentObject) {
                            foreach ($students as $student) {
                                if ($ratedStudentObject->id == $student->id) {
                                    $student->priorität++;
                                    //Log::info('Die Priorität von student:' . $ratedStudentObject->id ." wurde um eins erhöht. Priorität ist jetzt: ".$student->priorität);
                                }
                            }
                        }
                    }
                }
            }
            //Wenn alle studenten zugewiesen worden, kann abgebrochen werden.
            if (sizeof($students) == 0) {
                //Log::info("-------BREAK!!!");
                break;
            }
        }
        return "true";
    }
    private function orderBySpots(array $array)//sortiert AGs nach Anzahl Plätzen absteigend
    {
        $orderedArray = array();
        foreach ($array as $workgroup) {
            $spots = DB::table("workgroups")->select("spots")->where("id", $workgroup)->get()[0]->spots;
            $orderedArray[$workgroup] = $spots;
        }
        arsort($orderedArray);//sortiert das array nach values(spots) absteigend

        return array_keys($orderedArray);
    }

//Ändert das Statusfeld, wenn wahl geöffnet bzw geschlossen wurde
    public function toggleOpened1()
    {
        $opened = DB::table("options")->select("opened")->get()[0]->opened;
        if ($opened == 1) {
            DB::table("options")->update(["opened" => 0]);
            return view("ajax.admin_statusfield", ["status" => "close"]);
        } else {
            DB::table("options")->update(["opened" => 1]);
            return view("ajax.admin_statusfield", ["status" => "open"]);
        }
    }//Tauscht den Öffnen/Schließen Button aus, wenn wahl geöffnet bzw geschlossen wurde

    public function toggleOpened2()
    {
        //opened wurde gerade durch toggleOpened1() verändert
        $opened = DB::table("options")->select("opened")->get()[0]->opened;
        if ($opened == 1) {
            return view("ajax.admin_closeOpenButton", ["status" => "open"]);
        } else {
            return view("ajax.admin_closeOpenButton", ["status" => "close"]);
        }
    }

//den geänderten WelcomeText in die DB speichern
    public function saveWelcome(Request $request)
    {
        $lang = $request->lang;
        $text = $request->text;
        if ($lang == "de") {
            DB::table("options")->update(["welcomeDE" => $text]);
        } else {
            DB::table("options")->update(["welcomeEN" => $text]);
        }
        return ("true");
    }

//initiiert den download des Ergebnisses
    public function downloadResultsXlsx()
    {
        Excel::create("Wahlergebnisse vom " . getdate()["month"] . "_" . getdate()["year"], function ($excel) {

            $excel->sheet('Ergebnisse', function ($sheet) {
                $students = DB::table("users")
                    ->join("workgroups", "users.zugewiesen", "workgroups.id")
                    ->join("ratings", function ($join) {
                        $join->on("workgroups.id", "=", "ratings.workgroup");
                        $join->on('users.id', '=', 'ratings.user');
                    })->select('users.id', 'users.name', 'lastname', 'matrnr', 'email', 'workgroups.name as zugewiesen', 'workgroups.groupLeader as leiter', 'ratings.rating as rating')
                    ->where('userlevel', 0)
                    ->orderBy('matrnr', 'asc')->get();

                $avgRating = DB::table("users")
                    ->join("workgroups", "users.zugewiesen", "workgroups.id")
                    ->join("ratings", function ($join) {
                        $join->on("workgroups.id", "=", "ratings.workgroup");
                        $join->on('users.id', '=', 'ratings.user');
                    })->where('userlevel', 0)
                    ->avg('rating');

                $ags = DB::table("workgroups")
                    ->leftJoin("ratings", "ratings.workgroup", "workgroups.id")
                    ->leftJoin("users", function ($join) {
                        $join->on("workgroups.id", "=", "users.zugewiesen");
                        $join->on('users.id', '=', 'ratings.user');
                    })->select('workgroups.name as wName', 'workgroups.groupLeader as leiter', 'workgroups.spots as plätze', DB::raw('COUNT(zugewiesen) as belegt'), DB::raw('AVG(rating) as avgRating'))
                    ->groupBy('workgroups.name', 'workgroups.groupLeader', 'workgroups.spots')
                    ->orderBy('workgroups.name', 'asc')->get();

                $parameters = ['students' => $students, "avgRating" => $avgRating, "ags" => $ags];
                $sheet->loadView('partials.admin_Ergebnisse', $parameters);
            });
        })->download('xlsx');
        //return response()->download("../storage/app/Ergebnisse.xlsx", "Wahlergebnisse vom ".getdate()["month"]."_".getdate()["year"].".xlsx");
    }
}
