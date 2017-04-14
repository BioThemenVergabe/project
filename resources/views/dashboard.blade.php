@extends('layouts.app')

@section('content')

<header>
    <div class="container">
        <div class="row">
            <div class="pull-right">
                <div class="btn btn-link">Studierende</div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default icon icon-home"></button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" class=""icon icon-log-out">Separated link</a></li>
                    </ul>
                </div>
            </div>
            <label id="logo">{{ config('app.name') }}</label>
        </div>
    </div>
</header>

<section class="container">

    <div class="row">
        <div class="col-xs-12">
            <h1>Willkommen, <small>Benutzer</small></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <a href="#" class="thumbnail">
                <img src="..." alt="..." />
            </a>
        </div>
        <div class="col-xs-6 col-xs-offset-1">
            <div class="form-group row">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <span contentEditable>Max</span> <span contentEditable>Muster</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label">Matrikelnummer</label>
                <div class="col-sm-9">
                    <span>123456</span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 control-label">E-Mail</label>
                <div class="col-sm-9">
                    <span contentEditable>max.muster@uni-konstanz.de</span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 control-label">Wahlergebnis</label>
                <div class="col-sm-9">
                    <span>Noch kein Ergebnis</span>
                </div>
            </div>
        </div>

        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default pull-right"> Profil bearbeiten</a>
    </div>

    <div class="placeholder"></div>

    <div class="row">
        <form method=""post" action="#">
            <div class="row">

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
                                <input type="range" name="ag-1" value="5" class="form-control" aria-describedby="ag-1" min="0" max="10">
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
                                <input type="range" name="ag-1" value="5" class="form-control" aria-describedby="ag-1" min="0" max="10">
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
                                <input type="range" name="ag-1" value="5" class="form-control" aria-describedby="ag-1" min="0" max="10">
                                <span class="input-group-addon">10</span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <div class="pull-right"><label id="sum"></label></div>
                                <label>Summe:</label>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <div class="pull-right">
                    <input type="submit" class="btn btn-default icon icon-save" value="@lang('fields.save')">
                    <input type="reset" class="btn btn-danger icon icon-cross" value="@lang('fields.reset')">
                </div>

            </div>
        </form>

    </div>

</section>


@include('modals.forgot')
@include('modals.register')

@endsection

