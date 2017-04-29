function anhaengen(){
    $('#AG_Table tr:last').after('<tr><td><input class="gl form-control"></td><td><input class="gn form-control"></td><td><input class="pl form-control" type="number"></td><td><input class="zp form-control"></td><td><button type="button" class="löschButton btn btn-default btn-xs form-control" data-toggle="modal" data-target="#löschModal"><span class="icon icon-minus"></span></button></td></tr>');

    $('.löschButton').click(function () {
        trigger=this;
    });
}
function update(){
    $('#AG_anz').html($("#AG_Table tr").length -1);
}

var trigger;
function deleteTrigger(){
    $(trigger).parent().parent().remove();
    update();
}

var triggerStudent;
function deleteStudentTrigger(){
    $(triggerStudent).parent().parent().parent().remove();
}

$(document).ready(function() {
//    $("#AG_Table").tablesorter();

    $('table .btn-group').parent().width($('table .btn-group').width());

    $('.löschButton').click(function () {
      trigger = this;
    });

    $('#löschModal').on('show.bs.modal', function () {
        var row = $(trigger).parent().parent();
        var GL = row.find("input.gl").val();
        var GN = row.find("input.gn").val();
        var PL = row.find("input.pl").val();
        var ZP = row.find("input.zp").val();

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

    $('.bearbeitenButton').click(function(){
        window.location = "/admin_studenten_bearbeiten";
    });

    $('#bearbeiten-abbrechen').click(function(){
        window.location = "/admin_studenten";
    });

    $('#bearbeiten-speichern').click(function(){
        window.location = "/admin_studenten";
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
            $('#close_open_body').html('<ul><li>No more students can be registered</li><li>The students cannot change their profile data or ratings themselves</li><li>Only you as administrator can do that, under "Students overview"</li><li>If you want to open the rating-process, you can, by pressing the same button that you used to close</li></ul>');
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


});

