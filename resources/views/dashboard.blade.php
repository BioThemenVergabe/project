@extends('layouts.app')

@section('links')
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span
            class="hidden-xs"> @lang('fields.gtElect')</span></a>
@endsection

@section('content')

@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.welcome'),
                    <small>{{$user->name}} {{$user->lastname}}</small>
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
                        <span>{{$user->name}} {{$user->lastname}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.matnr')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>{{$user->matrnr}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.mail')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>{{$user->email}}</span>
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
                        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                            @lang('fields.editProfile')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                    @lang('fields.editProfile')</a>
            </div>


            <div class="placeholder"></div>

            <hr/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped voting">
                    <thead>
                        <tr>
                            <th class="col-xs-3"><label>@lang('fields.ag')</label></th>
                            <th><label>@lang('fields.valuta')</label></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ratings as $rating)
                        <tr>
                            <td>
                                <div class="input-group pull-right hidden-xs hidden-sm">
                                    <span data-target="range" class="btn btn-default disabled"></span>
                                </div>
                                <label>Arbeitsgruppe #1</label>
                            </td>
                            <td>
                                <span class="progress-bar" style="width: 10%;"></span>
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