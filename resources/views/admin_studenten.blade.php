@extends('layouts.admin')

@section('links')
    <li><a href="/admin">Dashboard</a></li>
    <li><a href="/admin_AG">Arbeitsgruppen</a></li>
@endsection

@section('content')
    <!--jumbotron-->
    <div class="jumbotron">
        <div id="a_s_main" class="container-fluid">
            <!--Überschrift-->
            <div class="row">
                <div class="col-md-7 col-md-offset-3">
                    <h1>Studenten Übersicht</h1>
                </div>
            </div>

            <!--1.Zeile-->
            <div class="top-buffer row">
                <div class="col-md-3 col-md-offset-3">
                    Anzahl Studenten: <span id="stud_anz">x</span>
                </div>
            </div>

            <!--Studenten-Tabelle-->
            <div class="top-buffer row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr><th>Matr.Nr.</th><th>Name</th><th>AG</th><th></th></tr>
                            <tr><td class="ma">00001</td><td class="na">Peter Meyer</td><td class="za">-</td><td><div class="btn-group" role="group"><button type="button" class="bearbeitenButton btn btn-info">bearbeiten</button><button type="button" class="btn btn-danger löschStudentButton" data-toggle="modal" data-target="#löschStudentModal">löschen</button></div></td></tr>
                            <tr><td class="ma">00002</td><td class="na">Hans</td><td class="za">-</td><td class="bt"><div class="btn-group" role="group"><button type="button" class="bearbeitenButton btn btn-info">bearbeiten</button><button type="button" class="btn btn-danger löschStudentButton" data-toggle="modal" data-target="#löschStudentModal">löschen</button></div></td></tr>
                            <tr><td class="ma">00003</td><td class="na">Jens</td><td class="za">-</td><td class="bt"><div class="btn-group" role="group"><button type="button" class="bearbeitenButton btn btn-info">bearbeiten</button><button type="button" class="btn btn-danger löschStudentButton" data-toggle="modal" data-target="#löschStudentModal">löschen</button></div></td></tr>
                            <tr><td class="ma">00004</td><td class="na">Klaus</td><td class="za">-</td><td class="bt"><div class="btn-group" role="group"><button type="button" class="bearbeitenButton btn btn-info">bearbeiten</button><button type="button" class="btn btn-danger löschStudentButton" data-toggle="modal" data-target="#löschStudentModal">löschen</button></div></td></tr>
                            <tr><td class="ma">00005</td><td class="na">Arnold</td><td class="za">-</td><td class="bt"><div class="btn-group" role="group"><button type="button" class="bearbeitenButton btn btn-info">bearbeiten</button><button type="button" class="btn btn-danger löschStudentButton" data-toggle="modal" data-target="#löschStudentModal">löschen</button></div></td></tr>
                        </table>
                    </div>
                </div>
            </div><!--Collapse Studenten-Tabelle-->

            <!--Löschen-Modal-->
            <div class="modal fade" id="löschStudentModal" tabindex="-1" role="dialog" aria-labelledby="löschStudentModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="löschModalLabel">Möchten sie den Studenten wirklich löschen?</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <table id="löschmodal-row" class="table table-striped">
                                        <tr><th>Matr.Nr.</th><th>Name</th><th>AG</th></tr>
                                        <tr id="insert-student"><td class="ma"></td><td class="na"></td><td class="za"></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="deleteStudentTrigger()" type="button" class="btn btn-default" data-dismiss="modal">Löschen</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Nicht Löschen</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Collapse Löschen-Modal-->
        </div><!--Collapse Container-->
    </div><!--Collapse Jumbotron-->

@endsection