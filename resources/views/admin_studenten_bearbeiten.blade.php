@extends('layouts.admin')

@section('links')
<a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
<a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"> <span
            class="hidden-xs"> Arbeitsgruppen</span></a>
@endsection

@section('content')

<div class="admin container-fluid">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="panel">

            <!--Überschrift-->
            <div class="row">
                <div class="col-md-7">
                    <h1>Profil bearbeiten</h1>
                </div>
            </div>

            <form id="student_bearbeiten" class="form-horizontal" method="post" action="/admin">
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
                        <input id="edit.matnr" type="number" class="form-control" name="matnr"
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

                <div class="form-group row">
                    <label for="edit.avgPrio" class="col-md-3 control-label">Durchschnittliche Bewertung:</label>

                    <div class="col-md-8">
                        <div class="col-xs-1 btn btn-default disabled" id="avg-bewertung">
                            x
                        </div>
                        <div class="col-xs-5 ">
                            <button id="bewertung_einsehen" type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#AG_Wahl_Modal">Bewertungen einsehen
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit.last" class="col-md-3 control-label">Letzte &Auml;nderung:</label>

                    <div class="col-md-8">
                        <span class="btn btn-default disabled">01.01.1970</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit.registered" class="col-md-3 control-label">Registriert seit:</label>

                    <div class="col-md-8">
                        <span class="btn btn-default disabled">01.01.1970</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary pull-right">
                            @lang('fields.save')
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <button type="reset" class="btn btn-default">
                            @lang('fields.reset')
                        </button>
                        <a href="{{ URL::previous() }}" type="button" class="btn btn-link">
                            Abbrechen
                        </a>
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
                <button onclick="" type="button" class="btn btn-primary" data-dismiss="modal"> Änderungen speichern
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Zurück</button>
            </div>
        </div>
    </div>
</div>
<!--Collapse AG_Wahl-Modal-->
@endsection