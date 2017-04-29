@extends('layouts.app')

@section('links')
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span class="hidden-xs"> @lang('fields.gtElect')</span></a>
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

            <div class="col-xs-5 col-md-3">
                <a href="#">
                    <img src="{{ asset('/img/default-user.png') }}" alt="Default Userpicture"
                         class="img-thumbnail img-circle img-responsive"/>
                </a>
            </div>
            <div class="col-xs-7 col-md-6 col-md-offset-1">
                <div class="form-group row">
                    <label class="col-md-4 control-label">@lang('fields.name')</label>
                    <div class="col-md-8">
                        <span>Max Muster</span>
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
                        <span>max.muster@uni-konstanz.de</span>
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

                <div class="form-group row">
                    <div class="col-xs-12 hidden-md hidden-lg">
                        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default"> @lang('fields.editProfile')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default"> @lang('fields.editProfile')</a>
            </div>


            <div class="placeholder"></div>

            <hr/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="col-xs-3"><label>@lang('fields.ag')</label></th>
                        <th><label>@lang('fields.valuta')</label></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="input-group pull-right hidden-xs hidden-sm">
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
                            <div class="input-group pull-right hidden-xs hidden-sm">
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
                            <div class="input-group pull-right hidden-xs hidden-sm">
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
                            <div class="input-group pull-right hidden-xs hidden-sm">
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
    </div>
</section>


@include('modals.forgot')
@include('modals.register')

@endsection