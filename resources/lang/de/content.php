<?php

return [

    /*
     * all
     */


    /*
     * ACP
     */
    'heading_ag' => 'AG Übersicht',
    'ag1' => 'Anzahl AGs',
    'ag2' => '<em>Hinweis:</em>
              <i>Sobald ein Student eine Bewertung abgegeben hat, können keine AGs gelöscht werden oder neue hinzugefügt werden,
              die Bestehenden können jedoch verändert werden. Um AGs hinzuzufügen/löschen müssen alle Bewertungen gelöscht werden (Im Menü "Wahlgang beenden")</i>',
    'ag3' => 'Summe verfügbarer Plätze',
    'heading_stud' => 'Studenten Übersicht',
    'stud1' => 'Anzahl Studenten',
    'heading_stud_be' => 'Profil bearbeiten',
    'admin_sb1' => 'Abgegebene Wahl',
    'admin_sb2' => 'Bewertungen einsehen und bearbeiten',
    'admin_sb3' => 'Letzter Login',
    'admin_sb4' => 'Registriert seit',
    'admin_sb5' => 'Student hat noch nicht gewählt',
    'admin_dash1' => 'Anzahl angemeldeter Studenten',
    'admin_dash2' => 'Studenten',
    'admin_dash3' => 'Anzahl Studenten ohne Wahlabgabe',
    'admin_dash4' => 'Status der aktuellen Wahl',
    'admin_dash5' => 'geöffnet',
    'admin_dash6' => 'geschlossen',
    'admin_dash7' => 'Status der Zuweisung',
    'admin_dash8' => 'nicht gestartet',
    'admin_dash9' => 'abgeschlossen',


    'modal_Begr1' => 'Begrüßungstext bearbeiten',
    'modal_Begr2' => 'Begrüßungstext',
    'modal_Begr3' => 'Text Speichern',
    'modal_close1' => 'Sie haben die aktuelle Wahl geschlossen',
    'modal_close2' => '<ul><li>Es können sich keine neuen Studenten anmelden</li><li>Die Studenten können ihre getroffene Wahl und ihr Profil nicht mehr selbstständig ändern</li><li>Dies können nur noch sie als Administrator unter dem Reiter "Übersicht Studenten"</li><li>Sollten sie die Wahl wieder eröffnen wollen, können sie dies über denselben Button tun, den sie zum schließen genutzt haben</li></ul>',
    'modal_open1' => 'Sie haben die aktuelle Wahl geöffnet',
    'modal_open2' => '<ul><li>Ab jetzt können sich neue Studenten anmelden</li><li>Alle angemeldeten Studenten können neue Wahlen treffen,diese verändern oder ihr Profil bearbeiten</li><li>Sollten sie die Wahl schließen wollen, können sie dies über denselben Button tun, den sie zum öffnen genutzt haben</li></ul>',
    'modal_delag1' => 'Möchten sie die wirklich AG löschen?',
    'modal_delstud' => 'Möchten sie den Studenten wirklich löschen?',
    'modal_endel1' => 'Möchten sie diesen Wahlgang wirklich beenden?',
    'modal_endel2' => 'Wenn sie den Wahlgang beenden, werden alle angemeldeten Studenten mit den getroffenen Wahlen gelöscht!!!',
    'modal_endel3' => 'Hinweis: Haben sie die Wahlergebnisse bereits heruntergeladen und exportiert? Wenn nicht, dann tun sie das bitte hier:',
    'modal_endel4' => 'Wenn sie die Wahl wirklich beenden wollen, geben sie bitte das Admin-Passwort ein und drücken sie unten auf "Wahl beenden"',
    'modal_endel5' => 'Admin-Passwort',
    'modal_endel6' => 'Wahl beenden',
    'modal_endel7' => 'Wenn sie nur alle <u>eingegangenen Bewertungen und zugewiesenen AGs</u> löschen möchten, geben sie das Passwort ein und bestätigen sie mit diesem Knopf:',
    'modal_endel8' => 'Bewertungen löschen',
    'modal_endel9' => 'Wenn sie nur alle <u>zugewiesenen AGs </u>von den Studenten löschen möchten, geben sie das Passwort ein und bestätigen sie mit diesem Knopf:',
    'modal_endel10' => 'Zuweisungen löschen',
    'modal_saveAg1' => 'Speichern erfolgreich',
    'modal_saveAg2' => 'Sie haben erfolgreich ihre Änderungen gespeichert!',
    'modal_studWahl1' => 'Übersicht der getroffenen Wahl von',
    'modal_studWahl2' => 'Durchschnitt der abgegebenen Wahl',
    'modal_studWahl3' => 'Note',
    'modal_startAlgo1' => 'Sie haben die Zuweisung gestartet',
    'modal_startAlgo2' => 'Die Zuweisung wurde korrekt gestartet!',
    'modal_startAlgo3' => 'Dies kann länger dauern! Bitte warten sie einen Moment, dieses Fenster wird sich automatisch schließen, sobald die Berechnungen abgeschlossen sind.',
    'admin_dashboard_alert' => '<strong>Info:</strong> Die folgenden Studenten haben noch nicht gewählt:',
    'admin_dashboard_alert3' => 'Die Berechnung können erst  gestartet werden, wenn alle angemeldeten Studenten gewählt haben. Sie können Studenten im Menü "Studenten" löschen.',
    'admin_dashboard_alert2' => '<strong>Info:</strong> Die Zuweisung wurde noch nicht gestartet. Ergebnisse stehen erst danach zur Verfügung.',
    'admin_AG_alert' => '<strong>Achtung:</strong> Die Spalten "Gruppenleiter", "Gruppenname" and "Plätze" dürfen bei keiner AG leer sein. Bitte löschen sie überflüssige Reihen bzw. füllen sie die leeren Zellen aus!',
    'admin_AG_alert2' => '<strong>Achtung:</strong> Es existieren derzeit zwei Gruppen mit dem selben Namen. Die Gruppennamen müssen eindeutig sein!',
    'admin_delRatings1' => 'Löschen erfolgreich',
    'admin_delRatings2' => 'Sie haben erfolgreich alle Ratings gelöscht!',
    'admin_delAssign1' => 'Löschen erfolgreich',
    'admin_delAssign2' => 'Sie haben erfolgreich alle zugewiesenen AGs von den Studenten gelöscht! Kein Student hat nun eine zugewiesene AG',
    'admin_algoSucces1' => 'Algorithmus erfolgreich',
    'admin_algoSucces2' => 'Der Algorithmus hat erfolgreich abgeschlossen! Jedem Studenten wurde die bestmögliche AG zugewiesen!',
    'admin_electionEnded1' => 'Sie haben die Wahl erfolgreich beendet!',
    'admin_electionEnded2' => 'Alle abgegebenen Bewertungen wurden aus der Datenbank entfernt!',
    'admin_electionEnded3' => 'Alle angemeldeten Studenten wurden aus der Datenbank entfernt!',
    'admin_electionEnded4' => 'Der Status der aktuellen Wahl wurde auf <i>geschlossen</i> gesetzt!',
    'admin_electionEnded5' => 'Der Status der Zuweisung wurde auf <i>nicht gestartet</i> gesetzt!',
    'impr1' => 'Postanschrift:',
    'impr2' => 'Die Universität Konstanz ist eine Körperschaft des öffentlichen Rechts. Sie wird juristisch durch dessen Rektor gesetzlich vertreten.',


    /*
     * Userpanel
     */

];
