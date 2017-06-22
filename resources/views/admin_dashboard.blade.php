@extends('layouts.admin')

@section('links')
    <a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"><span
                class="hidden-xs"> @lang('fields.ag')</span></a>
    <a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"><span
                class="hidden-xs"> @lang('fields.students')</span></a>
@endsection

@section('content')
    <section class="container" id="placeholder">
        <div class="panel">
            <div class="panel-body">
                @include('alerts.admin_dashboard')
                @include('alerts.admin_dashboard2')
                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <h1>Dashboard</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-3 col-xs-8">
                        @lang('content.admin_dash1'):
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <div class="pull-right">
                            {{$numberStudents}} @lang('content.admin_dash2')
                        </div>
                    </div>
                </div>

                @if($noRating != 0)
                    <div id="noRatings" class=" row">
                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-3 col-xs-8">
                            @lang('content.admin_dash3'):
                        </div>
                        <div class="col-sm-3 col-md-2 col-xs-4">
                            <div class="pull-right">
                                {{$noRating}} @lang('content.admin_dash2')
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-3 col-xs-8">
                        @lang('content.admin_dash4'):
                    </div>
                    <div id="status_field">
                        <div class="col-sm-3 col-md-2 col-xs-4">
                            <div class="pull-right">
                                @if($status=="open")
                                    <span class="icon icon-check"></span> @lang('content.admin_dash5')
                                @else
                                    <span class="icon icon-cross"></span> @lang('content.admin_dash6')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-xs-6">
                        @lang('content.admin_dash7'):
                    </div>
                    <div id="rated" class="col-sm-4 col-md-2 col-xs-6">
                        <div class="pull-right">
                            @if($rated==false)
                                <span class="icon icon-cross"></span> @lang('content.admin_dash8')
                            @else
                                <span class="icon icon-check"></span> @lang('content.admin_dash9')
                            @endif
                        </div>
                    </div>
                </div>

                <div class="top-buffer-2 row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <span id="close_open_button">
                            @if($status=="open")
                                <button id="wahl_schliessen_button" type="button"
                                        class="btn btn-primary btn-block icon icon-block"
                                        data-toggle="modal" data-target="#Wahl_schließen" onclick="toggle()"> @lang('fields.closeElect')
                                </button>
                            @else
                                <button id="wahl_öffnen_button" type="button"
                                        class="btn btn-primary btn-block icon icon-controller-play"
                                        data-toggle="modal" data-target="#Wahl_öffnen" onclick="toggle()"> @lang('fields.openElect')
                                </button>
                            @endif
                        </span>

                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button id="start_Algo" type="button"
                                class="btn btn-primary btn-block icon icon-hour-glass"> @lang('fields.startAlgo')</button>
                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        @if($rated==true)
                            <a id="Ergebnisse_download" class="btn btn-primary btn-block icon icon-download">
                                @lang('fields.downloadResults')
                            </a>
                        @else
                            <button id="Ergebnisse_download_disabled"
                                    class="btn btn-primary btn-block icon icon-download  disabled"> @lang('fields.downloadResults')</button>
                        @endif
                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button type="button" class="btn btn-primary btn-block icon icon-edit" data-toggle="modal"
                                data-target="#Begruessungstext_Modal"> @lang('fields.editText')</button>
                    </div>
                </div>
                <div class="last top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button type="button" class="btn btn-primary btn-block icon icon-cross" data-toggle="modal"
                                data-target="#Wahlgang_beenden_Modal"> @lang('fields.endElect1')
                            <br> <span id="achtung"> (@lang('fields.endElect2'))</span></button>
                    </div>
                </div>
                {{ csrf_field() }}
            </div>
        </div>
    </section>

    @include('modals.acp-close-vote')
    @include('modals.acp-open-vote')
    @include('modals.acp-begruessungstext')
    @include('modals.acp-end-election')
    @include('modals.acp-end-election-succesfull')
    @include('modals.acp-del-ratings')
    @include('modals.acp-del-Assignments')
    @include('modals.acp-start-algo')
    @include('modals.acp-algo-succes')

    @if($action=="ended")
        <script>
            $("#election_ended").modal("show");
        </script>
    @elseif($action=="deleted")
        <script>
            $("#löschRatingsModal").modal("show");
        </script>
    @elseif($action=="deletedAssignments")
        <script>
            $("#löschAssignmentsModal").modal("show");
        </script>
    @elseif($action=="algoSucces")
        <script>
            $("#algoSuccesModal").modal("show");
        </script>
    @endif

@endsection