function anhaengen(){
    $('#AG_table tr:last').after('<tr><td style="display:none"><input name="id[]" class="id" form="AG_form"></td><td><input name ="name[]" class="gn form-control" form="AG_form"></td><td><input name ="groupLeader[]" class="gl form-control" form="AG_form"></td><td><input name="spots[]" class="pl form-control" type="number" form="AG_form"></td><td><input name="date[]" class="zp form-control" form="AG_form"></td><td><button type="button" class="löschButton btn btn-default btn-xs form-control" data-toggle="modal" data-target="#löschModal"><span class="icon icon-minus"></span></button></td></tr>');

    $('.löschButton').click(function () {
        trigger=this;
    });
}
function update(){
    $('#AG_anz').html($("#AG_table tr").length -1);
}

var trigger;

//wird aufgerufen, nach dem Bestätigen vom Löschen einer AG
function deleteTrigger(){
    var row = $(trigger).parent().parent();
    var ID = row.find("input.id").val();
    //wenn eine AG aus DB geladen wurde, dann ist ID != ""
    if(ID !== ""){
        $("#AG_table").load("admin_AG_delete?id="+ID , function(){
            update();
            //onclick muss für neu geladene Tabelle neu gesetzt werden
            $('.löschButton').click(function () {
                trigger = this;
            });
        });
        //ansonsten wurde die AG gerade erst eingegeben, und wird jetzt einfach aus dem DOM gelöscht
    }else{
        $(row).remove();
    }
}

//Für /admin_AG: Wird aufgerufen, wenn gespeichert werden soll
function checkSave(){
    var valide = true; //AGs konsistent?

    var nameUnique = true; //ist der Gruppenname eindeutig?
    var nameArray = [];
    //über alle Gruppenleiter, darf nicht leer sein
    $("input.gl").each(function() {
        if($(this).val()==""){
            valide = false;
        }
    });
    //über alle Gruppennamen, darf nicht leer sein
    $("input.gn").each(function() {
        if($(this).val()==""){
            valide = false;
        }
        //überprüfe ob name unique
        for (i = 0; i < nameArray.length; i++) {
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
        $("#AG_form").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            $.ajax({
                type: "POST",
                url: "/admin_AG_save",
                data: $("#AG_form").serialize(), // serializes the form's elements.
                success: function(data){// die IDs der neu eingegebenen AGs werden in die jeweiligen Felder eingetragen
                    var newIDs = JSON.parse(data);//data ist ein Array mit den neuen IDs und den zugehörigen namen
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
        $("#AG_form").submit();
        $('#speicherModal').modal('toggle');

    }else if(nameUnique==false) {
        $('#ag_alert2').show();
    }else{
        $('#ag_alert').show();
    }
}




//delStudenten-Modal lösch Button wird hier ausgeführt -> Student wird aus DB gelöscht
var triggerStudent;
function deleteStudentTrigger(){
    //Get anfrage an /delstudent
    var row = $(triggerStudent).parent().parent().parent();
    var matrnr = $(row).find('.ma').html();
    var name = $(row).find('.na').html();
    window.location = "/studenten_delete?"+"matrnr="+matrnr+"&name="+name;

}

$(document).ready(function() {

    //$('table .btn-group').parent().width($('table .btn-group').width());

    $('.löschButton').click(function () {
      trigger = this;
    });

    //modal für das löschen einer AG
    $('#löschModal').on('show.bs.modal', function () {
        var row = $(trigger).parent().parent();
        var ID = row.find("input.id").val();
        var GL = row.find("input.gl").val();
        var GN = row.find("input.gn").val();
        var PL = row.find("input.pl").val();
        var ZP = row.find("input.zp").val();

        $('#insert-ag .id').html(ID);
        $('#insert-ag .gl').html(GL);
        $('#insert-ag .gn').html(GN);
        $('#insert-ag .pl').html(PL);
        $('#insert-ag .zp').html(ZP);
    });


    $('.löschStudentButton').click(function () {
        triggerStudent = this;
    });
    $('#löschStudentModal').on('show.bs.modal', function () {
        var row = $(triggerStudent).parent().parent().parent();
        var Ma = row.find("td.ma").html();
        var NA = row.find("td.na").html();
        var ZA = row.find("td.za").html();

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





    //Dashboard-buttons:
    $('#wahl_schliessen').click(function(){
        if($('#wahl_schliessen_text').html() == ' Wahl schließen'){
            $('#close_open').html('geschlossen');
            $('#close_open_body').html('<ul><li>Es können sich keine neuen Studenten anmelden</li><li>Die Studenten können ihre getroffene Wahl und ihr Profil nicht mehr selbstständig ändern</li><li>Dies können nur noch sie als Administrator unter dem Reiter "Übersicht Studenten"</li><li>Sollten sie die Wahl wieder eröffnen wollen, können sie dies über denselben Button tun, den sie zum schließen genutzt haben</li></ul>');
            $('#wahl_schliessen_text').html(' Wahl öffnen');
            $('#wahl_schliessen').removeClass("icon-block");
            $('#wahl_schliessen').addClass("icon-controller-play");
        }
        else if($('#wahl_schliessen_text').html() == ' Wahl öffnen'){
            $('#close_open').html('geöffnet');
            $('#close_open_body').html('<ul><li>Ab jetzt können sich neue Studenten anmelden</li><li>Alle angemeldeten Studenten können neue Wahlen treffen,diese verändern oder ihr Profil bearbeiten</li><li>Sollten sie die Wahl schließen wollen, können sie dies über denselben Button tun, den sie zum öffnen genutzt haben</li></ul>');
            $('#wahl_schliessen_text').html(' Wahl schließen');
            $('#wahl_schliessen').removeClass("icon-controller-play");
            $('#wahl_schliessen').addClass("icon-block");
        }

        if($('#wahl_schliessen_text').html() == ' Close the rating-process'){
            $('#close_open').html('Closed');
            $('#close_open_body').html('<ul><li>No more students can be registered</li><li>The students cannot change their profile data or ratings themselves</li><li>Only you as administrator can do so, under "Students overview"</li><li>If you want to open the rating-process, you can, by pressing the same button that you used to close</li></ul>');
            $('#wahl_schliessen_text').html(' Open the rating-process');
            $('#wahl_schliessen').removeClass("icon-block");
            $('#wahl_schliessen').addClass("icon-controller-play");
        }
        else if($('#wahl_schliessen_text').html() == ' Open the rating-process'){
            $('#close_open').html('Open');
            $('#close_open_body').html('<ul><li>From now on, new students can register</li><li>All registered students can change their profile and ratings</li><li>If you want to close the rating-process, you can, by pressing the same button that you used to open</li></ul>');
            $('#wahl_schliessen_text').html(' Close the rating-process');
            $('#wahl_schliessen').removeClass("icon-controller-play");
            $('#wahl_schliessen').addClass("icon-block");
        }
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


