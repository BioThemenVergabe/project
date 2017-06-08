@extends('layouts.app')

@section('links')
<a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span
            class="hidden-xs"> @lang('fields.dashboard')</span></a>
@endsection

@section('css')

@endsection

@section('JS')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('assets/js/jquery.ui.touchpunch.min.js') }}"></script>

<script>
    $(function () {
        $('#sortableRatings').sortable({ cancel: '.hr-divider'});
    });
</script>

@endsection

@section('content')
@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.selection')</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bs-callout bs-warning">
                            <h4>@lang('rating.howTo')</h4>
                            <ul>
                                <li>@lang('rating.how')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="hr-divider">

            <form method="post" name="wahl" action="{{ url('/wahl') }}">
                {{ csrf_field() }}

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="ui-widget-content" id="sortableRatings">
                                @if($ratings->count() > 0)
                                    @foreach($ratings as $key => $rating)
                                        @foreach($ags as $ag)
                                            @if($ag->id == $rating->workgroup)
                                                <div class="bs-callout">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <label>{{ $ag->name }}</label>
                                                            </div>
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="pull-right">
                                                                    {{ $ag->date }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                {{ $ag->groupLeader }}
                                                            </div>
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="hidden-xs hidden-sm pull-right">
                                                                    {{ $ag->spots }} @lang('fields.spots')
                                                                </div>
                                                                <div class="hidden-md hidden-lg">
                                                                    {{ $ag->spots }} @lang('fields.spots')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="ag[]" value="{{ $ag->id }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @else
                                    @foreach($ags as $ag)
                                        <div class="bs-callout">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <label>{{ $ag->name }}</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="pull-right">
                                                            {{ $ag->date }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        {{ $ag->groupLeader }}
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="hidden-xs hidden-sm pull-right">
                                                            {{ $ag->spots }} @lang('fields.spots')
                                                        </div>
                                                        <div class="hidden-md hidden-lg">
                                                            {{ $ag->spots }} @lang('fields.spots')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="ag[]" value="{{ $ag->id }}">
                                        </div>
                                    @endforeach
                                @endif


                            </div>

                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-primary icon icon-save" value="@lang('fields.save')">
                    <input type="reset" class="btn btn-danger icon icon-cross" value="@lang('fields.reset')">
                </div>

            </form>

        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="errorMsg">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">@lang('fields.error')</h4>
            </div>
            <div class="modal-body">
                @lang('fields.ratingToLow')
            </div>
        </div>
    </div>
</div>

@endsection

