@extends('layouts.admin')

@section('links')
    <li><a href="/admin_AG">Arbeitsgruppen</a></li>
    <li><a href="/admin_studenten">Studenten</a></li>
@endsection

@section('content')


    <div class="jumbotron">
        <div id="a_d_main" class="container-fluid">


            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-6 col-md-offset-2">
                    Anzahl angemeldeter Studenten:
                </div>
                <div class="col-md-2">
                    X Studenten
                </div>
            </div>

            <div class=" row">
                <div class="col-md-6 col-md-offset-2">
                    Anzahl Studenten ohne Wahlabgabe:
                </div>
                <div class="col-md-2">
                    Y Studenten
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-stop" ></span> Wahl schließen</button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary  btn-lg disabled"><span class="glyphicon glyphicon-hourglass"></span> Berechnungsalgorithmus starten</button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary  btn-lg"><span class="glyphicon glyphicon-download-alt"></span> Ergebnisse downloaden</button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">

                    <button type="button" class="btn btn-primary  btn-lg"><span class="glyphicon glyphicon-edit"></span> Begrüßungstext ändern</button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary  btn-lg"><span class="glyphicon glyphicon-remove"></span> Wahlgang beenden <br> <span id="achtung"> (Es werden alle Daten gelöscht)</span></button>
                </div>
            </div>
        </div>
    </div>

@endsection