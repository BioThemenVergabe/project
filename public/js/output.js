function calcSum(){var t=0;$("[data-target=range]").each(function(){t+=parseInt($(this).html())}),$("#sum").html(t)}function anhaengen(){$("#AG_Table tr:last").after('<tr><td><input class="gl form-control"></td><td><input class="gn form-control"></td><td><input class="pl form-control" type="number"></td><td><input class="zp form-control"></td><td><button type="button" class="löschButton btn btn-default btn-xs form-control" data-toggle="modal" data-target="#löschModal"><span class="icon icon-minus"></span></button></td></tr>'),$(".löschButton").click(function(){trigger=this})}function update(){$("#AG_anz").html($("#AG_Table tr").length-1)}function deleteTrigger(){$(trigger).parent().parent().remove(),update()}function deleteStudentTrigger(){$(triggerStudent).parent().parent().parent().remove()}$(function(){$("[data-target=range]").html(function(){return $(this).parents("tr").find("input[type=range]").val()}),$("[type=range]").on("input change",function(){var t=$(this).attr("id");$(this).parents("tr").find("[data-target=range]").html($(this).val()),$("tr[data-row="+t+"]").find(".copyOf").val(parseInt($(this).val())),$("[data-row-copy="+t+"]").find("input[data-copy]").val(parseInt($(this).val())),calcSum()}),$("[type=range][data-copy]").on("input change",function(){var t=$(this).data("copy");$("#"+t).val($(this).val()),$("tr[data-row="+t+"]").find("[data-target=range]").html($(this).val()),$("tr[data-row="+t+"]").find(".copyOf").val(parseInt($(this).val())),calcSum()}),$(".copyOf").on("input change",function(){var t=$(this).parents("tr").data("row");$("#"+t).val(parseInt($(this).val())),$("tr[data-row="+t+"]").find("[data-target=range]").html($(this).val()),$("[data-row-copy="+t+"]").find("input[data-copy]").val(parseInt($(this).val())),calcSum()}),$("a[data-action]").on("click",function(t){t.preventDefault(),$("#"+$(this).data("action")).modal()}),$("[type=reset]").click(function(t){$(this).closest("form").get(0).reset();var e=0;$("[data-target=range]").each(function(){$(this).html(function(){return $(this).parents("tr").find("input[type=range]").val()}),$(this).parents("tr").find("input.copyOf").val(parseInt($(this).html())),e+=parseInt($(this).html()),$("#sum").html(e)})}),calcSum(),$(".copyOf").attr("value",function(){return $("#"+$(this).parents("tr").data("row")).val()}),$('[data-toggle="popover"]').popover(),$(".dropdown-toggle").dropdown(),$("#logo").on("click",function(){window.location.href=$(location).attr("protocol")+"//"+$(location).attr("hostname")+":"+$(location).attr("port")+"/home"})});var trigger,triggerStudent;$(document).ready(function(){$("table .btn-group").parent().width($("table .btn-group").width()),$(".löschButton").click(function(){trigger=this}),$("#löschModal").on("show.bs.modal",function(){var t=$(trigger).parent().parent(),e=t.find("input.gl").val(),n=t.find("input.gn").val(),l=t.find("input.pl").val(),a=t.find("input.zp").val();$("#insert-ag .gl").html(e),$("#insert-ag .gn").html(n),$("#insert-ag .pl").html(l),$("#insert-ag .zp").html(a)}),$(".löschStudentButton").click(function(){triggerStudent=this}),$("#löschStudentModal").on("show.bs.modal",function(){var t=$(triggerStudent).parent().parent().parent(),e=t.find("td.ma").html(),n=t.find("td.na").html(),l=t.find("td.za").html();$("#insert-student .ma").html(e),$("#insert-student .na").html(n),$("#insert-student .za").html(l)}),$(".bearbeitenButton").click(function(){window.location="/admin_studenten_bearbeiten"}),$("#bearbeiten-abbrechen").click(function(){window.location="/admin_studenten"}),$("#bearbeiten-speichern").click(function(){window.location="/admin_studenten"}),$("#wahl_schliessen").click(function(){" Wahl schließen"==$("#wahl_schliessen_text").html()?($("#close_open").html("geschlossen"),$("#close_open_body").html('<ul><li>Es können sich keine neuen Studenten anmelden</li><li>Die Studenten können ihre getroffene Wahl und ihr Profil nicht mehr selbstständig ändern</li><li>Dies können nur noch sie als Administrator unter dem Reiter "Übersicht Studenten"</li><li>Sollten sie die Wahl wieder eröffnen wollen, können sie dies über denselben Button tun, den sie zum schließen genutzt haben</li></ul>'),$("#wahl_schliessen_text").html(" Wahl öffnen"),$("#wahl_schliessen").removeClass("icon-block"),$("#wahl_schliessen").addClass("icon-controller-play")):" Wahl öffnen"==$("#wahl_schliessen_text").html()&&($("#close_open").html("geöffnet"),$("#close_open_body").html("<ul><li>Ab jetzt können sich neue Studenten anmelden</li><li>Alle angemeldeten Studenten können neue Wahlen treffen,diese verändern oder ihr Profil bearbeiten</li><li>Sollten sie die Wahl schließen wollen, können sie dies über denselben Button tun, den sie zum öffnen genutzt haben</li></ul>"),$("#wahl_schliessen_text").html(" Wahl schließen"),$("#wahl_schliessen").removeClass("icon-controller-play"),$("#wahl_schliessen").addClass("icon-block"))," Close the rating-process"==$("#wahl_schliessen_text").html()?($("#close_open").html("Closed"),$("#close_open_body").html('<ul><li>No more students can be registered</li><li>The students cannot change their profile data or ratings themselves</li><li>Only you as administrator can do that, under "Students overview"</li><li>If you want to open the rating-process, you can, by pressing the same button that you used to close</li></ul>'),$("#wahl_schliessen_text").html(" Open the rating-process"),$("#wahl_schliessen").removeClass("icon-block"),$("#wahl_schliessen").addClass("icon-controller-play")):" Open the rating-process"==$("#wahl_schliessen_text").html()&&($("#close_open").html("Open"),$("#close_open_body").html("<ul><li>From now on, new students can register</li><li>All registered students can change their profile and ratings</li><li>If you want to close the rating-process, you can, by pressing the same button that you used to open</li></ul>"),$("#wahl_schliessen_text").html(" Close the rating-process"),$("#wahl_schliessen").removeClass("icon-controller-play"),$("#wahl_schliessen").addClass("icon-block"))})});