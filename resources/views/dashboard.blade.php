@extends('layouts.app')

@section('links')
    <a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span class="hidden-xs"> Zur Wahl</span></a>
@endsection

@section('content')

@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.welcome'),
                    <small>Max Muster</small>
                </h1>
            </div>

            <div class="col-xs-12 col-md-4">
                <a href="#" class="thumbnail">
                    <img src="..." alt="..."/>
                </a>
            </div>
            <div class="col-xs-12 col-md-6 col-md-offset-1">
                <div class="form-group row">
                    <label class="col-md-4 control-label">@lang('fields.name')</label>
                    <div class="col-md-8">
                        <span contentEditable>Max</span> <span contentEditable>Muster</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.matnr')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>123456</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.mail')</label>
                    <div class="col-xs-12 col-md-8">
                        <span contentEditable>max.muster@uni-konstanz.de</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.results')</label>
                    <div class="col-xs-12 col-md-6">

                        <div class="btn-group btn-group-xs" role="group" aria-label="...">
                            <span class="btn btn-default disabled">@lang('fields.noresult')</span>
                            <span class="btn btn-danger icon icon-cross disabled"></span>
                        </div>

                    </div>
                </div>
            </div>

            <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default pull-right"> Profil
                bearbeiten</a>

            <div class="placeholder"></div>

            <hr/>

            <table class="table table-bordered table-striped table-responsive">
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
                            <input type="range" name="ag-1" value="1" class="form-control" min="0" max="10"
                                   disabled>
                            <span class="input-group-addon">10</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group pull-right">
                            <span data-target="range" class="btn btn-default disabled"></span>
                        </div>
                        <label>Arbeitsgruppe #2</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">0</span>
                            <input type="range" name="ag-2" value="7" class="form-control" min="0" max="10"
                                   disabled>
                            <span class="input-group-addon">10</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group pull-right">
                            <span data-target="range" class="btn btn-default disabled"></span>
                        </div>
                        <label>Arbeitsgruppe #3</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">0</span>
                            <input type="range" name="ag-3" value="2" class="form-control" min="0" max="10"
                                   disabled>
                            <span class="input-group-addon">10</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group pull-right">
                            <span data-target="range" class="btn btn-default disabled"></span>
                        </div>
                        <label>Arbeitsgruppe #4</label>
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">0</span>
                            <input type="range" name="ag-4" value="10" class="form-control" min="0" max="10"
                                   disabled>
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
                    <td>
                    </td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
</section>


@include('modals.forgot')
@include('modals.register')

@endsection