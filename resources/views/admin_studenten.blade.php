@extends('layouts.admin')

@section('links')
<a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
<a href="/admin_AG" class="btn btn-default btn-sm icon icon-traffic-cone"><span class="hidden-xs"> Arbeitsgruppen</span></a>
@endsection

@section('content')

<div class="admin container">
    <div class="panel">

        <div class="panel-body">
            <!--Überschrift-->
            <div class="row">
                <div class="col-md-7">
                    <h1>Studenten Übersicht</h1>
                </div>
            </div>

            <!--1.Zeile-->
            <div class="top-buffer row">
                <div class="col-md-8">
                    Anzahl Studenten: <span id="stud_anz">x</span>
                </div>
            </div>

            <!--Studenten-Tabelle-->
            <div class="top-buffer">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Matr.Nr.</th>
                                <th>Name</th>
                                <th class="">AG</th>
                                <th class="col-xs-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="ma">00001</td>
                            <td class="na">Peter Meyer</td>
                            <td class="za">-</td>
                            <td class="bt">
                                <div class="btn-group pull-right" role="group">
                                    <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                                class="hidden-xs"> Bearbeiten</span></div>
                                    <div class="btn btn-danger löschStudentButton icon icon-cross"
                                         data-toggle="modal"
                                         data-target="#löschStudentModal"><span class="hidden-xs"> Löschen</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ma">00002</td>
                            <td class="na">Hans</td>
                            <td class="za">-</td>
                            <td class="bt">
                                <div class="btn-group pull-right" role="group">
                                    <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                                class="hidden-xs"> Bearbeiten</span></div>
                                    <div class="btn btn-danger löschStudentButton icon icon-cross"
                                         data-toggle="modal"
                                         data-target="#löschStudentModal"><span class="hidden-xs"> Löschen</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ma">00003</td>
                            <td class="na">Jens</td>
                            <td class="za">-</td>
                            <td class="bt">
                                <div class="btn-group pull-right" role="group">
                                    <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                                class="hidden-xs"> Bearbeiten</span></div>
                                    <div class="btn btn-danger löschStudentButton icon icon-cross"
                                         data-toggle="modal"
                                         data-target="#löschStudentModal"><span class="hidden-xs"> Löschen</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ma">00004</td>
                            <td class="na">Klaus</td>
                            <td class="za">-</td>
                            <td class="bt">
                                <div class="btn-group pull-right" role="group">
                                    <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                                class="hidden-xs"> Bearbeiten</span></div>
                                    <div class="btn btn-danger löschStudentButton icon icon-cross"
                                         data-toggle="modal"
                                         data-target="#löschStudentModal"><span class="hidden-xs"> Löschen</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ma">00005</td>
                            <td class="na">Arnold</td>
                            <td class="za">-</td>
                            <td class="bt">
                                <div class="btn-group pull-right" role="group">
                                    <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                                class="hidden-xs"> Bearbeiten</span></div>
                                    <div class="btn btn-danger löschStudentButton icon icon-cross"
                                         data-toggle="modal"
                                         data-target="#löschStudentModal"><span class="hidden-xs"> Löschen</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--Collapse Studenten-Tabelle-->
    </div><!--Collapse panel-->
</div><!--Collapse col-xxx-->
</div><!--Collapse Container-->

<!--Löschen-Modal-->
@include('modals.acp-del-student')
<!--Collapse Löschen-Modal-->

@endsection