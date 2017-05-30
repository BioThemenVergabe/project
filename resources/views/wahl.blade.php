@extends('layouts.app')

@section('links')
<a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span
            class="hidden-xs"> @lang('fields.dashboard')</span></a>
@endsection

@section('CSS')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

@section('JS')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function () {
        $('#sortableRatings').sortable();
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

            <form method="post" name="wahl" action="{{ url('/wahl') }}">
                {{ csrf_field() }}

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="well ui-widget-content" id="sortableRatings">

                                @foreach($ags as $ag)

                                <div class="ui-state-default well">
                                    <label>{{ $ag->name }}</label>
                                    <input type="hidden" name="ag[]" value="{{ $ag->id }}">
                                </div>

                                @endforeach
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

