@extends('layouts.admin')

@section('links')
    <li><a href="/admin">Dashboard</a></li>
    <li><a href="/admin_AG">Arbeitsgruppen</a></li>
@endsection

@section('content')

    <div class="admin container-fluid">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel">

                <!--Überschrift-->
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <h1>Profil bearbeiten</h1>
                    </div>
                </div>
                <form id="student_bearbeiten">
                    <div class="top top-buffer-2 row">
                        <div class="col-md-4 col-md-offset-2">
                            Name:
                        </div>
                        <div class="col-md-4">
                            <input id="name_stud">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            E-Mail:
                        </div>
                        <div class="col-md-4">
                            <input id="mail" type="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            Matrikelnummer:
                        </div>
                        <div class="col-md-4">
                            <input id="matrikel">
                        </div>
                    </div>
                    <div class="top-buffer row">
                        <div class="col-md-4 col-md-offset-2">
                            Durchschnittliche Bewertung:
                        </div>
                        <div class="col-md-1" id="avg-bewertung">
                            x
                        </div>
                        <div class="col-md-3 ">
                            <button id="bewertung_einsehen" type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#AG_Wahl_Modal" >Bewertungen einsehen</button>
                        </div>
                    </div>

                    <div class="top-buffer row">
                        <div class="col-md-4 col-md-offset-2">
                            Letzte Änderung:
                        </div>
                        <div class="col-md-6" id="last_change">
                            01.01.1970
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            Registriert seit:
                        </div>
                        <div class="col-md-6" id="last_change">
                            01.01.1970
                        </div>
                    </div>
                    <div class=" last top-buffer-2 row">
                        <div class="col-md-2 col-md-offset-4">
                            <button id="bearbeiten-speichern" class="btn btn-primary" type="button">Speichern</button>
                        </div>
                        <div class="col-md-2">
                            <button id="bearbeiten-abbrechen" class="btn btn-default"  type="button">Abbrechen</button>
                        </div>
                    </div>
                </form>
            </div><!-- Collapse Panel-->
        </div>
    </div><!-- Collapse Container-->

    <!--AG-Wahl-Modal-->
    <div class="modal fade" id="AG_Wahl_Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Übersicht der getroffenen Wahl von Student: <i>Student1</i></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table id="AG_Wahl_Modal_row" class="table table-striped">
                                <tr>
                                    <th>AG</th>
                                    <th>Leiter</th>
                                    <th>Note</th>
                                </tr>
                                <tr>
                                    <td class="ag">AG1</td>
                                    <td class="leiter">EinLeiter</td>
                                    <td class="note"><input value="5"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="" type="button" class="btn btn-primary" data-dismiss="modal"> Änderungen speichern</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zurück</button>
                </div>
            </div>
        </div>
    </div>
    <!--Collapse AG_Wahl-Modal-->
@endsection