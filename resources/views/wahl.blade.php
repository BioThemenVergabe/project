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

            <form method="post" action="{{ url('/dashboard') }}">
                {{ csrf_field() }}
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="col-xs-3"><label>@lang('fields.ag')</label></th>
                        <th><label>@lang('fields.valuta')</label></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-target="ag-1">
                        <td>
                            <div class="input-group pull-right hidden-xs hidden-sm">
                                <span data-target="range" class="btn btn-default disabled"></span>
                            </div>
                            <label>Arbeitsgruppe #1</label>
                        </td>
                        <td>
                            <div class="form-group hidden-md hidden-lg">
                                <input type="number" class="form-control copyOf" id="ag-1" data-copy="range">
                            </div>
                            <div class="input-group input-group-sm hidden-xs hidden-sm">
                                <span class="input-group-addon">0</span>
                                <input type="range" name="ag-1" value="5" class="form-control" min="0" max="10">
                                <span class="input-group-addon">10</span>
                            </div>
                        </td>
                    </tr>

                    <tr class="hidden-md hidden-lg">
                        <td colspan="2">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">0</span>
                                <input type="range" name="ag-1" data-copy="ag-1" value="5" class="form-control" min="0" max="10">
                                <span class="input-group-addon">10</span>
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div class="input-group pull-right">
                                <span data-target="range" class="btn btn-default disabled"></span>
                            </div>
                            <label>Arbeitsgruppe #1</label>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">0</span>
                                <input type="range" name="ag-2" value="5" class="form-control" min="0" max="10">
                                <span class="input-group-addon">10</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group pull-right">
                                <span data-target="range" class="btn btn-default disabled"></span>
                            </div>
                            <label>Arbeitsgruppe #1</label>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">0</span>
                                <input type="range" name="ag-3" value="5" class="form-control" min="0" max="10">
                                <span class="input-group-addon">10</span>
                            </div>
                        </td>
                    </tr>
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

