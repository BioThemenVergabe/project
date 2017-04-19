@extends('layouts.admin')

@section('links')
<a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"><span class="hidden-xs"> Arbeitsgruppen</span></a>
<a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"><span class="hidden-xs"> Studenten</span></a>
@endsection

@section('content')

<section class="container">
    <div class="panel dashboard">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-xs-12 col-md-6 col-md-offset-1">
                    Anzahl angemeldeter Studenten:
                </div>
                <div class="col-xs-12 col-md-4">
                    <span class="pull-right">X Studenten</span>
                </div>
            </div>

            <div class=" row">
                <div class="col-xs-12 col-md-6 col-md-offset-1">
                    Anzahl Studenten ohne Wahlabgabe:
                </div>
                <div class="col-xs-12 col-md-4">
                    <span class="pull-right">Y Studenten</span>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button id="wahl_schliessen" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-stop" ></span><span id="wahl_schliessen_text"> Wahl schließen</span></button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button id="ergebnisse_downloaden" type="button" class="btn btn-primary disabled"><span class="glyphicon glyphicon-hourglass"></span> Zuweisung starten</button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span><a class="ignore_css" href="/Ergebnisse.html" download> Ergebnisse Downloaden</a></button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Begruessungstext_Modal"><span class="glyphicon glyphicon-edit"></span> Begrüßungstext ändern</button>
                </div>
            </div>

            <div class="last top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#Wahlgang_beenden_Modal"><span class="icon icon-cross"> Wahlgang beenden</span>
                       <br> <span id="achtung"> (Es werden alle Daten gel&ouml;scht)</span></button>
                </div>
            </div>
        </div>
    </div>
</section>

@include('modals.Begruessungstext_Modal')
@include('modals.Wahlgang_beenden_Modal')

@endsection