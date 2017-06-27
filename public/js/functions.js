"use strict";

//beim klicken des hinzufügen Buttons auf admin_AG, wird eine neue Zeile erstellt
function anhaengen() {
    $('#AG_table tr:last').after('<tr><td style="display:none"><input name="id[]" class="id" form="AG_form"></td><td><input name ="name[]" class="gn form-control" form="AG_form"></td><td><input name ="groupLeader[]" class="gl form-control" form="AG_form"></td><td><input name="spots[]" class="pl form-control" type="number" form="AG_form"></td><td><input name="date[]" class="zp form-control" form="AG_form"></td><td><button type="button" class="löschButton btn btn-default btn-xs form-control" data-toggle="modal" data-target="#löschModal"><span class="icon icon-minus"></span></button></td></tr>');

    $('.löschButton').click(function () {
        trigger=this;
    });
}
function update(){
    //Anzahl AGs updaten
    $('#AG_anz').html($("#AG_table tr").length -1);

    //Summe verfügbarer Plätze updaten
    var summe = 0;
    $("input.pl").each(function () {
       summe+=parseInt($(this).val());
    });
    $('#spots_anzahl').html(summe);

    //onclick muss für neu geladene Tabelle neu gesetzt werden
    $('.löschButton').click(function () {
        trigger = this;
    });
}

//wenn Wahl geöffnet oder geschlossen wird, wird dies an die DB geschickt und der Status geändert
function toggle(){
    var csrf = $("[name=_token]").serialize();
    $("#status_field").load("/admin_toggleOpened1", csrf);
    $("#close_open_button").load("/admin_toggleOpened2", csrf);
}


//wird aufgerufen, nach dem Bestätigen vom Löschen einer AG
var trigger;
function deleteTrigger(){
    var row = $(trigger).parent().parent();
    var ID = row.find("input.id").val();
    //wenn eine AG aus DB geladen wurde, dann besitzt sie bereits eine ID und ID ist dementsprechend != ""
    if(ID !== ""){
        $("#AG_table").load("admin_AG_delete?id="+ID , function(response, status, xhr){
            if ( status == "error" ) {
                alert("Hey Admin, diese AG wurde einem der Studenten zugewiesen und kann daher nicht gelöscht werden. \nDu kannst auf dem Dashboard jedoch alle zugewiesenen AGs löschen, die AG dann löschen und die Zuweisung erneut laufen lassen!");
            }else{
                update();
            }
        });
        //ansonsten wurde die AG gerade erst eingegeben, und wird jetzt einfach aus dem DOM gelöscht
    }else{
        $(row).remove();
    }
}

//Für /admin_AG: Wird aufgerufen, wenn gespeichert werden soll. Überprüfung ob AGs so in die DB gespeichert werden dürfen
function checkSave(){
    var valide = true; //AGs konsistent?
    var nameUnique = true; //ist der Gruppenname eindeutig?
    var nameArray = []; //Namen aller AGs

    //über alle Gruppenleiter, darf nicht leer sein
    $("input.gl").each(function() {
        if($(this).val()==""){
            valide = false;
        }
    });
    //über alle Gruppennamen, darf nicht leer sein und muss eindeutig sein
    $("input.gn").each(function() {
        if($(this).val()==""){
            valide = false;
        }
        //überprüfe ob name unique
        for (var i = 0; i < nameArray.length; i++) {
            if($(this).val()===nameArray[i]){
                nameUnique = false;
                valide=false;
            }
        }
        nameArray.push($(this).val());
    });

    //über alle Plätze, darf nicht leer sein
    $("input.pl").each(function() {
        if($(this).val()==""){
            valide = false;
        }
    });
    //Wenn keine Gruppenleiter/name oder Plätze einer AG leer ist, wird der aktuelle AG stand in die Datenbank geschrieben. Ansonsten wird der User darauf hingewiesen.
    if(valide==true){
        $('#ag_alert').hide();
        $('#ag_alert2').hide();

        //aktueller Stand des DOM wird in DB gespeichert
        $("#AG_form").submit();
        $('#speicherModal').modal('toggle');
        update();// Anzahl AGs und Spots updaten

    }else if(nameUnique==false) {
        $('#ag_alert2').show();
    }else{
        $('#ag_alert').show();
    }
}

//wenn der Admin das Rating eines Studenten ändert, wird ein AJAX  POST an /admin_sb_save geschickt und in die DB geschrieben
var errorInput = [];
function validateRating() {
    var valide = true;

    $("input.rating").each(function() {
        if($(this).val()<1 || $(this).val()>10 || $(this).val() % 1 !== 0){
            valide = false;
            //um falsches Feld einen roten Rand setzen
            errorInput.push($(this));
            $(this).css({ "border": '#FF0000 1px solid'});
        }
    });
    if(valide===true){
        $('#AG_Wahl_Modal').modal('hide');
        $(".modal-backdrop").remove(); //bug von Bootstrap: sollte eigentlich bei "hide" automatisch weg gehn
        $("#Rating_form").submit();
        $('#speicherModal2').modal('toggle');

        //roten Rand bei Fehleingabe wieder weg machen
        for (var i = 0; i < errorInput.length; i++) {
            $(errorInput[i]).css({ "border": '1px solid #ccc'});
        }
    }else{
        alert("Hey Admin, nicht vergessen, die Noten müssen Ganzzahlen zwischen 1 und 10 sein ;)");
    }

}
//nach dem Canceln des Veränderns der Bewertung eines Studenten, alte Werte wiederholen
function resetRating(){
    var users = $("input[name='id']");
    var userID = users[0].value;
    $("#AG_Wahl_Modal_row").load("admin_get_ratings?user="+userID);
}




//delStudenten-Modal lösch Button wird hier ausgeführt -> Student wird aus DB gelöscht
var triggerStudent;
function deleteStudentTrigger(){
    var row = $(triggerStudent).parent().parent().parent();
    var id = $(row).find('.id').html();
    window.location = "/studenten_delete?"+"id="+id; //Get request an /delstudent

}

$(document).ready(function() {
    //submit eventHandler, für student_bearbeiten wenn Änderung gespeichert werden soll
    $("#sb_form").submit(function (e) {
       e.preventDefault();
        $.post( "/admin_studenten",$("#sb_form").serialize(), function( data ) {
            if(data==="true"){//wenn speichern erfolgreich
                window.location = "/admin_studenten";
            }else if (data.error=="matrnr"){
                alert("Der Student "+data.name+" besitzt diese Matrikelnummer bereits. Eine Matrikelnummer muss eindeutig sein. Deine Eingabe wurde Rückgängig gemacht!");
                $("#sb_form")[0].reset();
            }else if (data.error=="email"){
                alert("Der Student "+data.name+" besitzt diese Email Adresse bereits. Eine Email Adresse muss eindeutig sein. Deine Eingabe wurde Rückgängig gemacht!");
                $("#sb_form")[0].reset();

            }
        });
    });



    //submit eventHandler, für admin_ag wenn der speicher Button geklickt wird
    $("#AG_form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin_AG_save",
            data: $("#AG_form").serialize(),
            success: function(data){
                var json = JSON.parse(data);
                var newIDs = json.IDs;//data ist ein Array mit den neuen IDs und den zugehörigen namen
                // die IDs der neu eingegebenen AGs werden in die jeweiligen Felder eingetragen
                $.each(newIDs,function() {
                    var jsonName=this.name;
                    var jsonID = this.id;
                    $("tbody>tr").each(function() {
                        var row = $(this);
                        var name = $(row).find('.gn').val();
                        if(name === jsonName){
                            $(row).find('.id').val(jsonID);
                        }
                    });
                });
            }
        });
    });

    //submit eventHandler, für /admin_studenten_bearbeiten modal, wenn Rating geändert wird
    $("#Rating_form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin_sb_save",
            data: $("#Rating_form").serialize(),
            success: function(data) {// neuer Durchschnittswert der Ratings
                $("#rDurchschnitt").html(parseFloat(data));
            }
        });
    });


    //wenn Wahlgang beendet werden soll
    $("#end_election").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin_end_election",
            data: $("#end_election").serialize(), // serializes the form's elements.
            success: function(data) {// Wert, ob input übereingestimmt hat
                if(data=="true"){
                    window.location ="/admin?action=ended";
                }else{
                    alert("Hey Admin. Das eingegebene Passwort war nicht korrekt.")
                }
            }
        });
    });
    //wenn alle Ratings gelöscht werden sollen
    $("#del_Ratings").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin_delete_ratings",
            data: $("#del_Ratings").serialize(),
            success: function(data) {// ob Löschen erfolgreich
                if(data=="true"){
                    window.location ="/admin?action=deleted";
                }else{
                    alert("Hey Admin. Das eingegebene Passwort war nicht korrekt.")
                }
            }
        });
    });
    //wenn alle Zuweisungen gelöscht werden sollen
    $("#del_Assigned").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin_delete_assignments",
            data: $("#del_Assigned").serialize(),
            success: function(data) {// ob Löschen erfolgreich
                if(data=="true"){
                    window.location ="/admin?action=deletedAssignments";
                }else{
                    alert("Hey Admin. Das eingegebene Passwort war nicht korrekt.")
                }
            }
        });
    });

    //Den Knopf (und damit die Reihe) der AG_Tabelle merken, welcher gedrückt wurde.
    $('.löschButton').click(function () {
      trigger = this;
    });
    //Den Knopf (und damit die Reihe) der Studenten_Tabelle merken, welcher gedrückt wurde.
    $('.löschStudentButton').click(function () {
        triggerStudent = this;
    });

    //modal für das löschen einer AG
    $('#löschModal').on('show.bs.modal', function () {
        //Alle Daten aus der Tabelle holen
        var row = $(trigger).parent().parent();
        var ID = row.find("input.id").val();
        var GL = row.find("input.gl").val();
        var GN = row.find("input.gn").val();
        var PL = row.find("input.pl").val();
        var ZP = row.find("input.zp").val();

        //Daten in Modal-Tabelle einfügen
        $('#insert-ag .id').html(ID);
        $('#insert-ag .gl').html(GL);
        $('#insert-ag .gn').html(GN);
        $('#insert-ag .pl').html(PL);
        $('#insert-ag .zp').html(ZP);
    });



    //modal für das löschen eines Studenten
    $('#löschStudentModal').on('show.bs.modal', function () {
        //Alle Daten aus der Tabelle holen
        var row = $(triggerStudent).parent().parent().parent();
        var ID = row.find("td.id").html();
        var Ma = row.find("td.ma").html();
        var NA = row.find("td.na").html();
        var ZA = row.find("td.za").html();

        //Daten in Modal-Tabelle einfügen
        $('#insert-student .id').html(ID);
        $('#insert-student .ma').html(Ma);
        $('#insert-student .na').html(NA);
        $('#insert-student .za').html(ZA);
    });

    //Get Request an _bearbeiten mit Daten des zu bearbeitenden Studenten
    $('.bearbeitenButton').click(function(){
        var row = $(this).parent().parent().parent();
        var id = $(row).find('.id').html();
        window.location = "/admin_studenten_bearbeiten?"+"id="+id;
    });


    //Per AJAX AGs neu laden, entsprechend zu Suchanfrage
    $("#AG_search_button").click(function () {
        var query = encodeURI($("#AG_search_query").val());//sonderzeichen maskieren
        $("#AG_table").load("admin_AG_search?q="+query, function(){
            update();

            //weil Tabelle (meistens) sehr klein ist, padding-bottom anpassen
            if($('#AG_table tr').length == 1) {
                $("section.container:first").css("padding-bottom","15em");
            }else if($('#AG_table tr').length <=3){
                $("section.container:first").css("padding-bottom","10em");
            }else{
                $("section.container:first").css("padding-bottom","0em");
            }
        });
    });
    //wenn Enter gedrückt wird soll anfrage auch geschickt werden
    $("#AG_search_query").keyup(function(event){
        if(event.keyCode == 13){
            $("#AG_search_button").click();
        }
    });


    //Per AJAX Studenten neu laden, entsprechend zu Suchanfrage
    $("#Stud_search_button").click(function () {
        var query = encodeURI($("#Stud_search_query").val());//sonderzeichen maskieren
        $("#Stud_table").load("admin_studenten_search?q="+query, function () {
            //Anzahl Studenten updaten
            $('#Stud_Anzahl').html($("#Stud_table tr").length -1);

            //neue onclicks für die Buttons setzen
            $('.löschStudentButton').click(function () {
                triggerStudent = this;
            });
            $('.bearbeitenButton').click(function(){
                var row = $(this).parent().parent().parent();
                var id = $(row).find('.id').html();
                window.location = "/admin_studenten_bearbeiten?"+"id="+id;
            });

            //weil Tabelle (meistens) sehr klein ist, padding-bottom anpassen
            if($('#Stud_table tr').length >3 && $('#Stud_table tr').length <9) {
                $("section.container:first").css("padding-bottom","10em");
            }else if($('#Stud_table tr').length <=3){
                $("section.container:first").css("padding-bottom","20em");
            }else{
                $("section.container:first").css("padding-bottom","0em");
            }
        });
    });
    //wenn Enter gedrückt wird soll anfrage auch geschickt werden
    $("#Stud_search_query").keyup(function(event){
        if(event.keyCode == 13){
            $("#Stud_search_button").click();
        }
    });





    //Dashboard-buttons:

    //speichern des geänderten Welcome Textes
    $("#change_welcome").click(function () {
        var csrf = $("[name=_token]");
        var language = "de";//je nachdem welche sprache, wird entweder der deutsche oder englische Text in der DB geändert
        if($("span.lang").hasClass("lang-en")){
            language = "en";
        }
        var daten = {_token:csrf[0].value , lang: language, text:$("#begruessung").val()};
        $.ajax({
            type: "POST",
            url: "/admin_welcome_save",
            data: daten
        });
    });

    //downloaden der ergebnisse
    $("#Ergebnisse_download").click(function () {
        window.location = "/admin_download_results";
    });

    //falls es noch Studenten ohne Wahlabgabe gibt, soll der Button zum  Zuweisung starten disabled sein
    if ($("#noRatings").length){
        $("#start_Algo").addClass("disabled");
    }

    $('#Ergebnisse_download_disabled').click(function(e){
        $('#dashboard_alert2').show();
    });
    $('#start_Algo').click(function(){
        //Wenn der Button disabled ist, wird alert angezeigt, dass es noch Studenten ohne Wahlabgabe gibt.
        if (document.getElementById('start_Algo').classList.contains('disabled')) {
            $('#dashboard_alert').show();
        }
        else{
            //start algo
            $('#startAlgoModal').modal('toggle');
            $.ajax({
                type: "POST",
                url: "/admin_start_algo",
                data: $("[name=_token]").serialize(), // serializes the form's elements.
                success: function(data) {// neuer Durchschnittswert der Ratings
                    if(data=="true"){
                        window.location ="/admin?action=algoSucces";
                    }else{
                        alert(data)
                    }

                }
            });


        }

    });
    $('#close_alert').click(function() {
        $('#dashboard_alert').hide()
    });
    $('#close_alert2').click(function() {
        $('#dashboard_alert2').hide()
    });
    $('#close_AG_alert').click(function() {
        $('#ag_alert').hide()
    });
    $('#close_AG_alert2').click(function() {
        $('#ag_alert2').hide()
    });

});


