@extends('layouts.admin')

@section('links')
<a href="/admin_AG" class="btn btn-default btn-sm icon icon-traffic-cone"><span class="hidden-xs"> Arbeitsgruppen</span></a>
<a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"><span class="hidden-xs"> Studenten</span></a>
@endsection

@section('content')

<section class="container">
    <div class="panel">
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
                    <button type="button" class="btn btn-primary btn-block icon icon-lock">
                        Wahl schließen
                    </button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary disabled btn-block icon icon-hour-glass"> Zuweisung starten
                    </button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary btn-block icon icon-download"> Ergebnisse downloaden
                    </button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-4 col-md-offset-4">

                    <button type="button" class="btn btn-primary icon icon-edit btn-block">
                        Begr&uuml;ßungstext ändern
                    </button>
                </div>
            </div>

            <div class="last top-buffer row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary btn-block"><span class="icon icon-cross"> Wahlgang beenden</span>
                       <br> <span id="achtung"> (Es werden alle Daten gel&ouml;scht)</span></button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection