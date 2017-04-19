@extends('layouts.app')

@section('links')
    <a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Startseite</span></a>
@endsection

@section('content')

@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.selection')</h1>
            </div>

            <form method="post" action="/">
                {{ csrf_field() }}
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="col-xs-3"><label>Arbeitsgruppe</label></th>
                        <th><label>Bewertung</label></th>
                    </tr>
                    </thead>
                    <tbody>
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
                                <input type="range" name="ag-1" value="5" class="form-control" min="0" max="10">
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
                                <input type="range" name="ag-1" value="5" class="form-control" min="0" max="10">
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
                                <input type="range" name="ag-1" value="5" class="form-control" min="0" max="10">
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
                    <input type="submit" class="btn btn-default icon icon-save" value="@lang('fields.save')">
                    <input type="reset" class="btn btn-danger icon icon-cross" value="@lang('fields.reset')">
                </div>

            </form>

        </div>
    </div>
</section>


@include('modals.forgot')
@include('modals.register')

@endsection

