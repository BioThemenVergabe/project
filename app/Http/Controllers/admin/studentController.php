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


class studentController
{


    //alle Studenten anzeigen. Admin Accounts werden nicht angezeigt!
    public function showStudents()
    {
        $zugewieseneStudenten = DB::table("users")->whereNotNull("zugewiesen")->get();
        if (sizeof($zugewieseneStudenten) == 0) {
            $students = DB::table("users")->where('userlevel', 0)->select('id', 'name', 'lastname', 'matrnr', 'email', 'zugewiesen')->orderBy('matrnr', 'asc')->get();

        } else {
            $students = DB::table("users")
                ->join("workgroups", "users.zugewiesen", "workgroups.id")
                ->join("ratings", function ($join) {
                    $join->on("workgroups.id", "=", "ratings.workgroup");
                    $join->on('users.id', '=', 'ratings.user');

                })
                ->select('users.id', 'users.name', 'lastname', 'matrnr', 'email', 'workgroups.name as zugewiesen', 'ratings.rating as rating')
                ->where('userlevel', 0)
                ->orderBy('matrnr', 'asc')->get();

            /*
             $students = DB::table("users")->join("workgroups", "users.zugewiesen", "=", "workgroups.id")->where('userlevel', 0)->select('users.id', 'users.name', 'lastname', 'matrnr', 'email', 'workgroups.name as zugewiesen')->orderBy('matrnr', 'asc')->get();
            foreach($students as $student){
                $student->rating = "x";
            }
            */
        }
        $numberStudents = DB::table("users")->where("userlevel", 0)->count();
        $parameters = ['students' => $students, "numberStudents" => $numberStudents];
        return view('admin_studenten', $parameters);
    }

    //die admin_studenten_bearbeiten seite wird mit den Parametern des angeklickten Studenten aufgerufen.
    public function editStudent(Request $request)
    {
        $studentArray = DB::table("users")->where('id', $request->id)->select('id', 'name', 'lastname', 'matrnr', 'email', 'created_at', 'updated_at')->get();
        $student = $studentArray[0];

        //ob student schon wahl abgegeben hat
        $ratingsCount = DB::table("ratings")->where("user", $student->id)->count();
        $ratings = array();
        $averageRating = 0;
        if ($ratingsCount == 0) {
            $rated = false;
        } else {
            //alle ratings des Studenten
            $ratings = DB::table("ratings")->join('workgroups', 'ratings.workgroup', '=', 'workgroups.id')->where('ratings.user', $student->id)->select('workgroups.id', 'workgroups.name', 'workgroups.groupLeader', 'workgroups.date', 'rating')->get();
            $rated = true;

            $sum = 0;
            foreach ($ratings as $r) {
                $sum += $r->rating;
            }
            $averageRating = $sum / sizeof($ratings);
            $averageRating = round($averageRating, 2);
        }


        $parameters = ['id' => $student->id, 'vorname' => $student->name, 'nachname' => $student->lastname, 'email' => $student->email, 'matrnr' => $student->matrnr,
            'änderung' => $student->updated_at, 'registrierung' => $student->created_at, 'rated' => $rated, 'ratings' => $ratings, 'averageRating' => $averageRating];
        return view('admin_studenten_bearbeiten', $parameters);
    }

    //nachdem auf _bearbeiten die Daten des Studenten bearbeitet wurden, werden sie gesichert, und man wird auf admin_studenten zurückgeleitet
    function saveStudent(Request $request)
    {
        $student = new studentModel($request->id, $request->name, $request->lastname, $request->matnr, $request->email);

        DB::table("users")->where('id', $student->getId())->update(['name' => $student->getName(), 'lastname' => $student->getLastname(), 'matrnr' => $student->getMatrnr(), 'email' => $student->getEmail()]);

        return $this->showStudents();
    }

    //nachdem das Löschen bestätigt wurde, wird der ausgewählte student hier aus der  DB gelöscht. Der nutzer wird auf admin_studenten zurückgeleitet
    function deleteStudent(Request $request)
    {
        DB::table("ratings")->where('user', $request->id)->delete();
        DB::table("users")->where('id', $request->id)->delete();

        return redirect("/admin_studenten");
    }

    //nachdem das Rating eines Studenten verändert wurde, wird diese Änderung in die DB zurückgeschrieben
    function saveRating(Request $request)
    {
        $studentenID = $request->input('studentID');
        $workgroupIDs = $request->input('workgroupID');
        $noten = $request->input('note');

        for ($i = 0; $i < count($workgroupIDs); $i++) {
            DB::table('ratings')
                ->where([
                    ['user', '=', $studentenID],
                    ['workgroup', '=', $workgroupIDs[$i]]
                ])->update(["rating" => $noten[$i]]);
        }

        $durchschnittRating = DB::table('ratings')
            ->where('user', $studentenID)
            ->avg('rating');
        return $durchschnittRating;
    }

    function getRating(Request $request)
    {
        $studentID = $request->user;
        //alle ratings des Studenten
        $ratings = DB::table("ratings")->join('workgroups', 'ratings.workgroup', '=', 'workgroups.id')->where('ratings.user', $studentID)->select('workgroups.id', 'workgroups.name', 'workgroups.groupLeader', 'workgroups.date', 'rating')->get();

        return view("ajax.admin_Rating_table", ["ratings" => $ratings]);
    }

    function searchStudents(Request $request)
    {
        $query = "%" . $request->q . "%";
        $students = DB::table("users")
            ->join("workgroups", "users.zugewiesen", "workgroups.id")
            ->join("ratings", function ($join) {
                $join->on("workgroups.id", "=", "ratings.workgroup");
                $join->on('users.id', '=', 'ratings.user');

            })
            ->select('users.id', 'users.name', 'lastname', 'matrnr', 'email', 'workgroups.name as zugewiesen', 'ratings.rating as rating')
            ->where([['userlevel', 0],['users.name', 'like', $query]])->orWhere([['userlevel', 0],['lastname', 'like', $query]])->orWhere([['userlevel', 0],['matrnr', 'like', $query]])->orWhere([['userlevel', 0],['workgroups.name', 'like', $query]])
            ->orderBy('matrnr', 'asc')->get();
        $numberStudents = DB::table("users")->where("userlevel", 0)->count();
        $parameters = ['students' => $students, "numberStudents" => $numberStudents];
        return view('ajax.admin_Studenten_table', $parameters);
    }
}