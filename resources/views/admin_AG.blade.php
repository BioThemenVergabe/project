@extends('layouts.admin')

@section('links')
    <li><a href="/admin">Dashboard</a></li>
    <li><a href="/admin_studenten">Studenten</a></li>
@endsection

@section('content')
    <!--jumbotron-->
    <div class="jumbotron">
        <div id="a_a_main" class="container-fluid">
            <!--Überschrift-->
            <div class="row">
                <div class="col-md-5 col-md-offset-4">
                    <h1>AG Übersicht</h1>
                </div>
            </div>

            <!--1.Zeile-->
            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-2">
                    Anzahl AGs: <span id="AG_anz">x</span>
                </div>
                <div class="col-md-4">
                    <button id="hinzufügen" onclick="anhaengen(); update() " type="button" class="btn btn-default btn-lg">hinzufügen <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                </div>
            </div>

            <!--AG-Tabelle-->
            <div class="top-buffer row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="table-responsive">
                        <table id="AG_Table" class="tablesorter table table-striped">
                            <tr><th>Gruppenleiter</th><th>Gruppenname</th><th>Plätze</th><th>(Zeitpunkt)</th><th></th></tr>
                            <tr><td><input class="gl"></td><td><input class="gn"></td><td><input class="pl" type="number"></td><td><input class="zp"></td><td><button type="button" class="löschButton btn btn-default" data-toggle="modal" data-target="#löschModal"><span class="glyphicon glyphicon-minus"></span></button></td></tr>
                        </table>
                    </div>
                </div>
            </div><!--Collapse AG-Tabelle-->

            <!--Löschen-Modal-->
            <div class="modal fade" id="löschModal" tabindex="-1" role="dialog" aria-labelledby="löschModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="löschModalLabel">Möchten sie die wirklich AG löschen?</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <table id="löschmodal-row" class="table table-striped">
                                        <tr><th>Gruppenleiter</th><th>Gruppenname</th><th>Plätze</th><th>(Zeitpunkt)</th><th></th></tr>
                                        <tr id="insert-ag"><td class="gl"></td><td class="gn"></td><td class="pl"></td><td class="zp"></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="deleteTrigger()" type="button" class="btn btn-default" data-dismiss="modal">Löschen</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Nicht Löschen</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Collapse Löschen-Modal-->


            <!--Speicher-Button-->
            <div class="top-buffer row">
                <div class="col-md-3 col-md-offset-3">
                    <button id="speicher-AG" type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#speicherModal">speichern</button>
                </div>
                <div class="col-md-3">
                    <button type="reset" class="btn btn-danger btn-lg">abbrechen</button>
                </div>
            </div><!--Collapse Speicher-Button-->

            <!--Speicher-Modal-->
            <div class="modal fade" id="speicherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Speichern erfolgreich</h4>
                        </div>
                        <div class="modal-body">
                            Sie haben folgende AGs hinzugefügt:
                            <ul>
                                <li>AG1</li>
                            </ul>
                            Sie haben folgende AGs gelöscht:
                            <ul>
                                <li>AG2</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Collapse Speicher-Modal-->

        </div><!--Collapse Container-->
    </div><!--Collapse Jumbotron-->
@endsection