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
                                <button class="btn btn-default" type="button"><span
                                            class="icon icon-magnifying-glass"></span></button>
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
                    <table id="AG_Table" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Gruppenleiter</th>
                            <th>Gruppenname</th>
                            <th>Plätze</th>
                            <th>(Zeitpunkt)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input class="gl form-control"></td>
                            <td><input class="gn form-control"></td>
                            <td><input class="pl form-control" type="number"></td>
                            <td><input class="zp form-control"></td>
                            <td>
                                <button type="button" class="löschButton btn btn-default btn-xs form-control"
                                        data-toggle="modal"
                                        data-target="#löschModal"><span
                                            class="icon icon-minus"></span></button>
                            </td>
                        </tr>
                        </tbody>
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

            </div>
        </div>
    </section>

    <!--Speicher-Modal-->
    @include('modals.acp-save-ag')


    <!--Löschen-Modal-->
    @include('modals.acp-del-ag')

@endsection