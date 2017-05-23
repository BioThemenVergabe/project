@extends('layouts.app')

@section('links')
    <a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> @lang('fields.dashboard')</span></a>
@endsection

@section('content')

@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.selection')</h1>
            </div>

            <form method="post" action="{{ url('/wahl') }}">
                {{ csrf_field() }}
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="col-xs-6 col-md-3"><label>@lang('fields.ag')</label></th>
                        <th><label>@lang('fields.valuta')</label></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ags as $ag)

                        <tr data-row="ag-{{ $ag->id }}">
                            <td>
                                <div class="input-group pull-right hidden-xs hidden-sm">
                                    <span data-target="range" class="btn btn-default disabled"></span>
                                </div>
                                <label>{{ $ag->name }}</label>
                            </td>
                            <td>
                                <div class="form-group hidden-md hidden-lg">
                                    <input type="number" class="form-control copyOf" data-copy="range" min="1" max="10">
                                </div>
                                <div class="input-group input-group-sm hidden-xs hidden-sm">
                                    <span class="input-group-addon">0</span>
                                    <input type="range" name="ag-{{ $ag->id }}" id="ag-{{ $ag->id }}" value="@foreach($ratings as $rating)
    @if($rating->workgroup == $ag->id)
        $rating->rating
    @else
        5
    @endif
@endforeach" class="form-control" min="1" max="10">
                                    <span class="input-group-addon">10</span>
                                </div>
                            </td>
                        </tr>

                        <tr data-row-copy="ag-{{ $ag->id }}" class="hidden-md hidden-lg">
                            <td colspan="2">
                                <div class="input-group input-group-sm col-xs-12">
                                    <span class="input-group-addon">0</span>
                                    <input type="range" name="ag-{{ $ag->id }}" data-copy="ag-{{ $ag->id }}" value="5" class="form-control" min="1" max="10">
                                    <span class="input-group-addon">10</span>
                                </div>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                    <tfoot>
                    <tr>
                        <td>
                            <div class="pull-right"><label id="sum"></label></div>
                            <label>@lang('fields.sum'):</label>
                        </td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>

                <div class="pull-right">
                    <input type="submit" class="btn btn-primary icon icon-save" value="@lang('fields.save')">
                    <input type="reset" class="btn btn-danger icon icon-cross" value="@lang('fields.reset')">
                </div>

            </form>

        </div>
    </div>
</section>


@include('modals.forgot')
@include('modals.register')

@endsection

