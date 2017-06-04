<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'welcomeDE' => "Wir, als Fachschaft Biologie der Universität Konstanz sind dafür zuständig, die für das Semester verfügbaren Fachthemen auf unsere Bachelor- bzw. Masterstudenten zu verteilen. Um dies für alle Beteiligten möglichst zufriedenstellend und fair zu gestalten, haben wir uns entschieden den Wahlprozess durch diese Web-Applikation zu unterstützen. Nachdem ihr euch registriert habt,  könnt ihr die zur Verfügung stehenden AGs eurer Priorität entsprechend bewerten, und nachdem alle ihre Wahl abgeschlossen haben, können wir eine optimale Zuweisung ermitteln.",
            'welcomeEN' => "We, as student representatives for biology of the university of constance are responsible, to assign the available subjects (AGs) of this semester to our bachelor- and masterstudents respectively. To achieve this as fair and satisfactorily for everyone, we have decided to support the election through this web-application. After you have registered,  you can rate the available subjects accordingly to your priority, and after everyone has submitted a rating, we can calculate the optimal allocation.",

        ]);
    }
}
