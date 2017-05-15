<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 11.05.2017
 * Time: 22:22
 */
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class workgroupController{
    public function showGroups(){
        $groups= DB::table("workgroups")->select('id','name','groupLeader', 'spots', 'date')->get();
        $numberGroups = DB::table("workgroups")->count();
        return view('admin_AG', ["groups"=>$groups, "numberGroups"=>$numberGroups]);
    }
    public function deleteGroup(Request $request){
        DB::table("workgroups")->where('id',$request->id)->delete();

        $groups= DB::table("workgroups")->select('id','name','groupLeader', 'spots', 'date')->get();
        return view('ajax.admin_AG_table', ["groups"=>$groups]);
    }
    public function saveGroups(Request $request){
        $ids = $request->input('id');
        $names = $request->input('name');
        $leaders = $request->input('groupLeader');
        $spotss = $request->input('spots');
        $dates = $request->input('date');

        $newIDs = array(); //IDs der neu hinzugefügten AGs

        //for schleife über alle input objekte
        for ($i = 0; $i < count($ids); $i++) {
            //id ist immer dann null, wenn die AG per javascript neu erzeugt wurde
            if($ids[$i]==null){
                DB::table("workgroups")->insert(
                    ["name"=>$names[$i], "groupLeader"=>$leaders[$i],"spots"=>$spotss[$i],"date"=>$dates[$i]]
                );
                $tempID = DB::table("workgroups")->where('name', $names[$i])->select('id')->get();
                $tempID2=array(
                    "name" => $names[$i],
                    "id" => $tempID[0]->id
                );
                $newIDs[] = $tempID2;
            }else{
                DB::table('workgroups')
                    ->where('id', $ids[$i])
                    ->update(["name"=>$names[$i], "groupLeader"=>$leaders[$i],"spots"=>$spotss[$i],"date"=>$dates[$i]]);
            }
        }
        return json_encode($newIDs);
    }

}