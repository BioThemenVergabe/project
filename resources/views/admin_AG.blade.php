@extends('layouts.admin')

@section('links')
<a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
<a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"> <span class="hidden-xs">Studenten</span></a>
@endsection

@section('content')

<section class="container">
    <div class="panel">
        <div class="panel-body">

            <!--Überschrift-->
            <div class="row">
                <div class="col-xs-8">
                    <h1>AG Übersicht</h1>
                </div>
                <div class="col-xs-4 pull-right top-buffer-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Suchen...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="icon icon-magnifying-glass"></span></button>
                            </span>
                    </div>
                </div>
            </div>

            <!--1.Zeile-->
            <div class="top-buffer row">
                <div class="col-md-4">
                    Anzahl AGs: <span id="AG_anz">x</span>
                </div>
                <div class="col-md-4 pull-right">
                    <button id="hinzufügen" onclick="anhaengen(); update() " type="button"
                            class="btn btn-default btn-sm">hinzufügen <span class="icon icon-plus"
                                                                            aria-hidden="true"></span></button>
                </div>
            </div>
            <br>
            <!--AG-Tabelle-->
            <div class="table-responsive">
                <table id="AG_Table" class="tablesorter table table-striped">
                    <tr>
                        <th>Gruppenleiter</th>
                        <th>Gruppenname</th>
                        <th>Plätze</th>
                        <th>(Zeitpunkt)</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input class="gl form-control"></td>
                        <td><input class="gn form-control"></td>
                        <td><input class="pl form-control" type="number"></td>
                        <td><input class="zp form-control"></td>
                        <td>
                            <button type="button" class="löschButton btn btn-default btn-xs form-control" data-toggle="modal"
                                    data-target="#löschModal"><span
                                        class="icon icon-minus"></span></button>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="last form-group">
                <div class="col-xs-6">
                    <button id="speicher-AG" type="submit" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#speicherModal">
                        @lang('fields.save')
                    </button>
                </div>
                <div class="col-xs-6">
                    <button onclick="location.href='/admin_AG';" type="reset" class="btn btn-danger">
                        @lang('fields.reset')
                    </button>
                </div>
            </div>

            <!--Speicher-Button-->
            <!--            <div class="last top-buffer row">
                            <div class="col-md-4 col-md-offset-1">
                                <button id="speicher-AG" type="submit" class="btn btn-primary pull-right" data-toggle="modal"
                                        data-target="#speicherModal">speichern
                                </button>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <button type="reset" class="btn btn-danger btn-lg">abbrechen</button>
                            </div>
                        </div>
                        -->
        </div>
    </div>
</section>

<!--Speicher-Modal-->
<div class="modal fade" id="speicherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
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


<!--Löschen-Modal-->
<div class="modal fade" id="löschModal" tabindex="-1" role="dialog" aria-labelledby="löschModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="löschModalLabel">Möchten sie die wirklich AG löschen?</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table id="löschmodal-row" class="table table-striped">
                            <tr>
                                <th>Gruppenleiter</th>
                                <th>Gruppenname</th>
                                <th>Plätze</th>
                                <th>(Zeitpunkt)</th>
                                <th></th>
                            </tr>
                            <tr id="insert-ag">
                                <td class="gl"></td>
                                <td class="gn"></td>
                                <td class="pl"></td>
                                <td class="zp"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="deleteTrigger()" type="button" class="btn btn-default"
                        data-dismiss="modal">Löschen
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Nicht Löschen
                </button>
            </div>
        </div>
    </div>
</div>
<!--Collapse Löschen-Modal-->

@endsection