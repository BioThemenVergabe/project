@extends('layouts.admin')

@section('links')
    <li><a href="/admin">Dashboard</a></li>
    <li><a href="/admin_AG">Arbeitsgruppen</a></li>
@endsection

@section('content')
    <!--jumbotron-->
    <div class="jumbotron">
        <div id="a_s_b_main" class="container-fluid">
            <!--Überschrift-->
            <div class="row">
                <div class="col-md-7 col-md-offset-3">
                    <h1>Profil bearbeiten</h1>
                </div>
            </div>
            <form>
                <div class="row">
                     <div class="col-md-1 col-md-offset-1">
                        Name:
                     </div>
                     <div class="col-md-5 col-md-offset-3">
                         <input id="name_stud">
                     </div>
                 </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        E-Mail:
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <input id="mail" type="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        Matrikelnummer:
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <input id="matrikel">
                    </div>
                </div>
                <div class="top-buffer row">
                    <div class="col-md-4 col-md-offset-1">
                        Durchschnittliche Bewertung:
                    </div>
                    <div class="col-md-1" id="avg-bewertung">
                        5
                    </div>
                    <div class="col-md-2 ">
                        <button class="btn btn-default">Bewertungen einsehen</button>
                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-3 col-md-offset-1">
                        Letzte Änderung:
                    </div>
                    <div class="col-md-5 col-md-offset-1" id="last_change">
                        01.01.1970
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        Registriert seit:
                    </div>
                    <div class="col-md-5 col-md-offset-1" id="last_change">
                        01.01.1970
                    </div>
                </div>
                <div class="top-buffer row">
                    <div class="col-md-2 col-md-offset-3">
                        <button id="bearbeiten-speichern" class="btn btn-primary">Speichern</button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default" id="bearbeiten-abbrechen" type="button">Abbrechen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection