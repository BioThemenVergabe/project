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
        $notRatedStudents = DB::table("users")->leftJoin("ratings", "users.id", "=", "ratings.user")->where("userlevel", 0)->whereNull('ratings.user')->select("users.*")->distinct()->get();

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
            "action" => $action, "welcomeDE" => $welcomeTextDE->welcomeDE, "welcomeEN" => $welcomeTextEN->welcomeEN,
            "notRatedStudents" => $notRatedStudents, "zugewieseneStudenten" => $zugewieseneStudenten];

        return view("admin_dashboard", $parameter);
    }

    //beendet Wahlgang: löscht alle Ratings und alle User. Danach sind nur noch Options und AGs in der DB
    public function checkAdmin(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObjects = DB::table("users")->select("password")->where("userlevel", 1)->get();

        $matches = false;
        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        foreach ($hashedPasswordObjects as $hashedPasswordObject) {
            $match = Hash::check($passwort, $hashedPasswordObject->password);
            if ($match) {
                $matches = true;
            }
        }
        if ($matches) {
            DB::table("ratings")->delete();
            DB::table("users")->where("userlevel", 0)->delete();
        }

        //var_export konvertiert den boolean in einen String
        return var_export($matches, true);
    }

    //löscht alle zugewiesenen AGs von den Studenten und zusätzlich alle abgegebenen Ratings
    public function deleteRatings(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObjects = DB::table("users")->select("password")->where("userlevel", 1)->get();

        $matches = false;
        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        foreach ($hashedPasswordObjects as $hashedPasswordObject) {
            $match = Hash::check($passwort, $hashedPasswordObject->password);
            if ($match) {
                $matches = true;
            }
        }
        if ($matches) {
            DB::table("ratings")->delete();
            DB::table("users")->where("userlevel", 0)->update(["zugewiesen" => NULL]);

        }

        return var_export($matches, true);
    }

    //löscht alle zugewiesenen AGs von den Studenten
    public function deleteAssignments(Request $request)
    {
        $passwort = $request->param;
        $hashedPasswordObjects = DB::table("users")->select("password")->where("userlevel", 1)->get();

        $matches = false;
        //die Hash::check Funktion nutzt gleichen Hash Algorithmus wie Laravel Auth
        foreach ($hashedPasswordObjects as $hashedPasswordObject) {
            $match = Hash::check($passwort, $hashedPasswordObject->password);
            if ($match) {
                $matches = true;
            }
        }
        if ($matches) {
            DB::table("users")->where("userlevel", 0)->update(["zugewiesen" => NULL]);
        }
        return var_export($matches, true);
    }

    public function startAlgo()
    {
        ini_set('max_execution_time', 360);

        //falls schon zuweisungen existieren, diese löschen.

        DB::table("users")->where("userlevel", 0)->update(["zugewiesen" => NULL]);

        //step 1:
        Log::info("--------------------step 1: for all AGs check if sum(ratings >= 7) is less then available positions");
        $groups = DB::table("workgroups")->select("id", "spots")->get();
        foreach ($groups as $group) {
            $ratings = DB::table("ratings")->where([
                ['workgroup', $group->id],
                ['rating', '>', '6'],
            ])->get();

            if (sizeof($ratings) <= $group->spots) {
                Log::info("-Workgroup " . $group->id . "matches.");
                foreach ($ratings as $rating) {
                    //Todo: What if a student has two AGs that fit (select one with higher rating)
                    DB::table("users")->where("id", $rating->user)->update(["zugewiesen" => $rating->workgroup]);
                    Log::info($rating->user . " was assigned.");
                }
            }
        }

        //steps 2:
        Log::info("\n--------------------step 2: starting old algorithm");
        $students = DB::table("users")->where("userlevel", 0)->whereNull('zugewiesen')->get();
        $this->startAlgo_old($students);


        //step 3:
        Log::info("\n--------------------step 3: Trying to improve assignments by trying to push down assigned students, in order to make space for badly assigned");
        $notAssigned = DB::table("users")->where("userlevel", 0)->whereNull("zugewiesen")->get();


        Log::info("Sizeof notAssigned: " . sizeof($notAssigned));

        if (sizeof($notAssigned) > 0) {
            $this->optimize($notAssigned);
        }

        $threshhold = 6;//all above this are good
        $max_iterations = 7;
        $iteration = 0;
        do {
            $iteration++;
            $badAssigned = DB::table("users")
                ->join("ratings", function ($join) {
                    $join->on("users.zugewiesen", "ratings.workgroup");
                    $join->on('users.id', 'ratings.user');
                })->where("ratings.rating", "<=", $threshhold)->select("users.*")->get();

            Log::info("\n\nSizeof badAssigned: " . sizeof($badAssigned));

            if (sizeof($badAssigned) > 0) {
                $this->optimize($badAssigned);
            } else {
                $availableAgs = DB::table("workgroups")
                    ->leftJoin("users", "users.zugewiesen", "workgroups.id")
                    ->select('workgroups.id as id', 'workgroups.spots as plätze', DB::raw('COUNT(zugewiesen) as belegt'))
                    ->groupBy('workgroups.id')
                    ->get();
                Log::info("Informationen zu den AGs, wieviele von den Plätzen wurden belegt:");
                Log::info(print_r($availableAgs,true));
                break;
            }
        } while($iteration < $max_iterations);

        return "true";
    }

    public function optimize($students)
    {
        //noch freie AGs
        $availableAgsTemp = DB::table("workgroups")
            ->leftJoin("users", "users.zugewiesen", "workgroups.id")
            ->select('workgroups.id as id', 'workgroups.spots as plätze', DB::raw('COUNT(zugewiesen) as belegt'))
            ->groupBy('workgroups.id')
            ->get();
        //array with id as key
        $availableAGs = array();
        foreach ($availableAgsTemp as $ag) {
            $availableAGs[$ag->id] = $ag;
            $availableAGs[$ag->id]->spotsLeft = $ag->plätze - $ag->belegt;
        }

        //try to push a student on top
        foreach ($students as $student) {
            $availableAGs = $this->optimizeStudent($student, $availableAGs);
        }
    }

    public function optimizeStudent($student, $availableAGs)
    {
        //zugewiesenes rating
        if (is_null($student->zugewiesen)) {
            $assigned = 1;
        } else {
            $assignedAG = $student->zugewiesen;
            $assigned = DB::table("ratings")->where([["workgroup", $assignedAG], ["user", $student->id]])->first()->rating;
        }

        Log::info("----Student: " . $student->id . " has an assignment of: " . $assigned);

        $ratings = DB::table("ratings")->where("user", $student->id)->get();
        //für alle ratings > als zugewiesen
        for ($i = 10; $i > $assigned; $i--) {
            foreach ($ratings as $rating) {
                if ($rating->rating == $i) {//for the rating with $i
                    $workgroup = $rating->workgroup;//the id of workgroup, that the badlyassigned Student has rated with $i
                    Log::info("---Selected Student voted for the group " . $workgroup . " with rating: " . $i);
                    $assignedStudents = DB::table("users")->where("zugewiesen", $workgroup)->get();//all other students that got assignet to this workgroup
                    foreach ($assignedStudents as $assStudent) {//try to move them down
                        $assRating = DB::table("ratings")->where([["user", $assStudent->id], ["workgroup", $workgroup]])->first()->rating; //how the other Student rated this workgroup
                        Log::info("-The other assigned student " . $assStudent->id . " voted for this workgroup with: " . $assRating);
                        $otherRatings = DB::table("ratings")->where([["user", $assStudent->id], ["workgroup", "<>", $workgroup]])->get();
                        foreach ($otherRatings as $oRating) {
                            //if space and loss less then gain)
                            $loss = $assRating - $oRating->rating;
                            $gain = $i - $assigned;
                            if ($availableAGs[$oRating->workgroup]->spotsLeft > 0 && $loss < $gain) {
                                Log::info("Found an available swap:");
                                Log::info("Switching " . $assStudent->id . " to workgroup " . $oRating->workgroup . "(rating of " . $oRating->rating . ")");
                                //Zuweisung ändern:
                                DB::table("users")->where("id", $assStudent->id)->update(["zugewiesen" => $oRating->workgroup]);
                                $availableAGs[$oRating->workgroup]->spotsLeft--;

                                DB::table("users")->where("id", $student->id)->update(["zugewiesen" => $workgroup]);
                                if (isset($assignedAG)) {
                                    $availableAGs[$assignedAG]->spotsLeft++;
                                }
                                return $availableAGs;
                            }
                        }
                    }
                }
            }
        }
        return $availableAGs;
    }


    public function startAlgo_old($students)
    {
        $log = true;

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
            if ($log) {
                Log::info("PräferenzRatings: " . print_r($präferenzRatings, true) . "\n");
            }

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
                if ($log) {
                    Log::info("---------------Die AG:" . $workgroup . " wurde bereits belegt von " . $plätzeBelegt . " Studenten");
                }
                $plätze = $plätzeGesamt - $plätzeBelegt;

                //Falls Anzahl der Bewertungen <= Plätze-> alle zuweisen
                if (sizeof($ratedStudents) <= $plätze) {
                    foreach ($ratedStudents as $ratedStudent) {
                        //Spalte in DB aktualisieren
                        DB::table("users")->where("id", "$ratedStudent")->update(["zugewiesen" => $workgroup]);
                        if ($log) {
                            Log::info('Dem Studenten: ' . $ratedStudent . " wurde die Gruppe " . $workgroup . " zugewiesen. Bewertung=" . $i . "\n");
                        }
                        //und den studenten aus Algorithmus entfernen
                        $index = -1; //der index des studenten in $students
                        for ($j = 0; $j < $anzahlStudents; $j++) {
                            if (isset($students[$j])) {
                                if ($students[$j]->id == $ratedStudent) {
                                    $index = $j;
                                    if ($log) {
                                        Log::info('Found the student:' . $ratedStudent . "\n");
                                    }
                                    break;
                                }
                            }
                        }
                        $students->forget($index);
                        if ($log) {
                            Log::info('Forgot the student:' . $ratedStudent . ". Es sind noch " . sizeof($students) . " zu verteilen \n");
                        }
                        if ($log) {
                            Log::info(print_r($students, true) . "\n");
                        }
                    }
                } //ansonsten Studenten mit höchster Priorität zuweisen.
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
                    //solange Studenten der aktuell höchsten Priorität zuweisen, bis voll
                    foreach ($ratedStudentsObject as $ratedStudentObject) {
                        if ($plätze == 0) {
                            if ($log) {
                                Log::info("Leider sind in dieser Gruppe keine Plätze mehr frei...\n");
                            }
                            break;
                        }
                        if ($ratedStudentObject->priorität == $maxPrio) {
                            //Spalte in DB aktualisieren
                            DB::table("users")->where("id", $ratedStudentObject->id)->update(["zugewiesen" => $workgroup]);
                            if ($log) {
                                Log::info('--ELSE: Dem Studenten: ' . $ratedStudentObject->id . " wurde die Gruppe " . $workgroup . " zugewiesen. Bewertung=" . $i . "\n");
                            }
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
                            if ($log) {
                                Log::info('--ELSE: Forgot the student:' . $ratedStudentObject->id . ". Es sind noch " . sizeof($students) . " zu verteilen \n");
                            }
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
                                    if ($log) {
                                        Log::info("Der Student " . $ratedStudentObject->id . " konnte leider nicht zugewiesen werden. Die Priorität von dem Studenten wurde um eins erhöht. Priorität ist jetzt: " . $student->priorität);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //Wenn alle studenten zugewiesen worden, kann der Algorithmus abgeschlossen werden.
            if (sizeof($students) == 0) {
                if ($log) {
                    Log::info("-------BREAK!!!");
                }
                break;
            }
        }
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
    public function toggleOpened1(Request $request)
    {
        $opened = $request->status;
        if ($opened == "open") {
            //dann schließen
            DB::table("options")->update(["opened" => 0]);
            return view("ajax.admin_statusfield", ["status" => "close"]);
        } else {
            //ansonsten öffnen
            DB::table("options")->update(["opened" => 1]);
            return view("ajax.admin_statusfield", ["status" => "open"]);
        }
    }

    //Tauscht den Öffnen/Schließen Button aus, wenn wahl geöffnet bzw geschlossen wurde
    public function toggleOpened2(Request $request)
    {
        $opened = $request->status;
        if ($opened == "open") {
            //wenn gerae offen ist, dann wurde durch toggleOpened1 geschlossen
            return view("ajax.admin_closeOpenButton", ["status" => "close"]);
        } else {
            return view("ajax.admin_closeOpenButton", ["status" => "open"]);
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
