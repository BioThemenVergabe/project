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
            alert('Sie haben die aktuelle Wahl geschlossen');
            $('#wahl_schliessen_text').html(' Wahl öffnen')
        }
        else if($('#wahl_schliessen_text').html() == ' Wahl öffnen'){
            alert('Sie haben die aktuelle Wahl geöffnet');
            $('#wahl_schliessen_text').html(' Wahl schließen')
        }
    });


});

