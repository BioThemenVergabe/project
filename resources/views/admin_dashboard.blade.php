@extends('layouts.admin')

@section('links')
<a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"><span class="hidden-xs"> @lang('fields.ag')</span></a>
<a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"><span class="hidden-xs"> @lang('fields.students')</span></a>
@endsection

@section('content')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div id="dashboard_alert" class="alert alert-warning alert-dismissable">
                <a id="close_alert" href="#" class="close" aria-label="close">&times;</a>
                @lang('content.admin_dashboard_alert')
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-sm-8 col-md-5 col-md-offset-3">
                   @lang('content.admin_dash1'):
                </div>
                <div class="col-sm-4 col-md-4 pull-right">
                    {{$numberStudents}} @lang('content.admin_dash2'):
                </div>
            </div>

            <div class=" row">
                <div class="col-sm-8 col-md-5 col-md-offset-3">
                    @lang('content.admin_dash3')
                </div>
                <div class="col-sm-4 col-md-4 pull-right">
                    y @lang('content.admin_dash2')
                </div>
            </div>

            <div class="top-buffer-2 row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <button id="wahl_schliessen" type="button" class="btn btn-primary btn-block icon icon-block" data-toggle="modal" data-target="#Wahl_schließen_öffnen"><span id="wahl_schliessen_text"> @lang('fields.closeElect')</span></button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <button id="start_Algo" type="button" class="btn btn-primary disabled btn-block icon icon-hour-glass"> @lang('fields.startAlgo')</button>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <a id="Ergebnisse_download" class="btn btn-primary btn-block icon icon-download" href="/Ergebnisse.html" download> @lang('fields.downloadResults')</a>
                </div>
            </div>

            <div class="top-buffer row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <button type="button" class="btn btn-primary btn-block icon icon-edit" data-toggle="modal" data-target="#Begruessungstext_Modal"> @lang('fields.editText')</button>
                </div>
            </div>

            <div class="last top-buffer row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <button type="button" class="btn btn-primary btn-block icon icon-cross" data-toggle="modal" data-target="#Wahlgang_beenden_Modal"> @lang('fields.endElect1')
                       <br> <span id="achtung"> (@lang('fields.endElect2'))</span></button>
                </div>
            </div>
        </div>
    </div>
</section>

@include('modals.acp-close-open-vote')
@include('modals.acp-begruessungstext')
@include('modals.acp-end-election')

@endsection