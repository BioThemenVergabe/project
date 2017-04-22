@extends('layouts.admin')

@section('links')
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"> <span
                class="hidden-xs"> Arbeitsgruppen</span></a>
@endsection

@section('content')

    <div class="container">
        <div class="panel">
            <div class="panel-body">

                <!--Überschrift-->
                <div class="row">
                    <div class="col-xs-8">
                        <h1>Profil bearbeiten</h1>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="/admin_studenten">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="edit.name" class="col-md-3 control-label">
                            @lang('fields.name')
                        </label>

                        <div class="col-md-8">
                            <input id="edit.name" type="text" class="form-control" name="name"
                                   value="{{ old('edit.name') }}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit.lastname" class="col-md-3 control-label">@lang('fields.lastname')</label>

                        <div class="col-md-8">
                            <input id="edit.lastname" type="text" class="form-control" name="lastname"
                                   value="{{ old('edit.lastname') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit.matnr" class="col-md-3 control-label">@lang('fields.matnr')</label>

                        <div class="col-md-8">
                            <input id="edit.matnr" type="text" class="form-control" name="matnr"
                                   value="{{ old('edit.matnr') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit.email" class="col-md-3 control-label">@lang('fields.mail')</label>

                        <div class="col-md-8">
                            <input id="edit.email" type="email" class="form-control" name="email"
                                   value="{{ old('edit.email') }}" required>
                        </div>
                    </div>
                    <div class="row top-buffer">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">
                                    Änderungen speichern
                                </button>

                                <button type="reset" class="btn btn-default">
                                    @lang('fields.reset')
                                </button>
                            </div>

                            <a href="{{ URL::previous() }}" type="button" class="btn btn-link">
                                Abbrechen
                            </a>
                        </div>
                    </div>
                    <hr class="top-buffer-3">
                    <div class="row top-buffer">
                        <div class="col-sm-3"><span id="Abg_Wahl"class="hidden-xs pull-right">Abgegebene Wahl:</span></div>

                        <div class="col-sm-9">
                                <button id="bewertung_einsehen" type="button" class="btn btn-info icon icon-edit"
                                        data-toggle="modal"
                                        data-target="#AG_Wahl_Modal"> Bewertungen einsehen und bearbeiten
                                </button>
                        </div>
                    </div>

                    <div class="row top-buffer">
                        <div class="col-xs-4 col-sm-3"><span class="hidden-xs pull-right">Letzte Änderung:</span><span class="visible-xs">Letzte Änderung:</span></div>

                        <div class="col-xs-8 col-sm-9">
                            <span>01.01.1970</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-3"><span class="hidden-xs pull-right">Registriert seit:</span><span class="visible-xs">Letzte Änderung:</span></div>

                        <div class="col-xs-8 col-sm-9">
                            <span>01.01.1970</span>
                        </div>
                    </div>


                </form>
            </div>
        </div><!-- Collapse Panel-->
    </div>
    </div><!-- Collapse Container-->

    <!--AG-Wahl-Modal-->
     @include('modals.acp-stud-wahl')
@endsection