<?php

use Illuminate\Database\Seeder;

class WorkgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workgroups')->insert([
            'name' => "Physiology and Biochemestry of Plants1",
            'groupLeader' => "Isono/Funck",
            "spots" => 3,
            "date" => "SS 17 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Biochmical Pharmacology1",
            'groupLeader' => "Brunner",
            "spots" => 1,
            "date" => "SS 17 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Molecular Evolutionary Biology1",
            'groupLeader' => "A. Meyer",
            "spots" => 6,
            "date" => "SS 17 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Fish Ecology",
            'groupLeader' => "Behrmann-Godel",
            "spots" => 1,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Behavioral Neurobiology1",
            'groupLeader' => "Kleineidam",
            "spots" => 1,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Dynamics of Aquatic Ecosystems1",
            'groupLeader' => "Peeters",
            "spots" => 6,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Limnology of the Lakes1",
            'groupLeader' => "Rothhaupt",
            "spots" => 8,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Novel in vitro Methods in PharmaTox1",
            'groupLeader' => "Leist",
            "spots" => 1,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Plant Ecology1",
            'groupLeader' => "Van Kleunen",
            "spots" => 10,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Molecular Toxicology, Bioimaging",
            'groupLeader' => "Bürkle/ May",
            "spots" => 1,
            "date" => "WS 17/18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Bioinformatics, structure analysis",
            'groupLeader' => "Diederichs/Mayans",
            "spots" => 1,
            "date" => "WS 17/18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Cell Biology",
            'groupLeader' => "Hauck",
            "spots" => 1,
            "date" => "WS 17/18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Microbiology, Limnology Ecology",
            'groupLeader' => "Schink",
            "spots" => 1,
            "date" => "WS 17/18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Physiology and Biochemestry of Plants2",
            'groupLeader' => "Isono/Funck",
            "spots" => 1,
            "date" => "WS 17/18 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Behavioral Neurobiology2",
            'groupLeader' => "Kleineidam",
            "spots" => 1,
            "date" => "WS 17/18 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Physiology, Molecular Biology of Algae",
            'groupLeader' => "Kroth",
            "spots" => 3,
            "date" => "WS 17/18 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Molecular Evolutionary Biology2",
            'groupLeader' => "A. Meyer	",
            "spots" => 3,
            "date" => "WS 17/18 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Cellular Biochemistry1",
            'groupLeader' => "Scheffner",
            "spots" => 1,
            "date" => "SS 17 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Novel in vitro methods in PharmaTox2",
            'groupLeader' => "Leist",
            "spots" => 1,
            "date" => "SS 18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Dynamics of Aquatic Ecosystems2",
            'groupLeader' => "Peeters",
            "spots" => 2,
            "date" => "SS 18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Limnology of the Lakes2",
            'groupLeader' => "Rothhaupt",
            "spots" => 2,
            "date" => "SS 18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Cellular Biochemistry2",
            'groupLeader' => "Scheffner",
            "spots" => 1,
            "date" => "SS 18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Molecular Genetics",
            'groupLeader' => "T. Mayer",
            "spots" => 1,
            "date" => "WS 17/18 -1",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Plant Ecology2",
            'groupLeader' => "Van Kleunen",
            "spots" => 1,
            "date" => "SS 18 -2",
        ]);
        DB::table('workgroups')->insert([
            'name' => "Molecular Microbiology an Cell Biology",
            'groupLeader' => "Deuerling",
            "spots" => 1,
            "date" => "SS 18 -2",
        ]);
    }
}
