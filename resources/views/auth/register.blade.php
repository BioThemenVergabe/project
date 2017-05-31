@extends('layouts.app')

@section('content')

<section class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel">
                <!-- Default panel contents -->
                <div class="panel-heading"><label>{{ config('app.name') }}</label></div>
                <div class="panel-body">

                        @include('auth.forms.register')

                </div>
            </div>
        </div>
    </div>

</section>

<div class="bg-warning container-fluid" id="cookieWarning">
    <div class="bs-callout bs-danger container">
        <h1 class="icon icon-new"> Cookie hinweis</h1>
        <p>Diese Seite verwendet Cookies. Cookies sind keine Artefakte in Ihrem Browser, welche uns erlauben zu
            erkennen, wenn Sie wieder auf diese Seite kommen.</p>
        <p>Cookies werden auf dieser Seite ausschließlich zur Nutzerwiedererkennung verwendet, nicht für
            Marketingzwecke.</p>
        <div class="pull-right">
            <div class="btn btn-primary" data-dismiss="cookieWarning">Akzeptieren</div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>
    section {
        height: 100% !important;
    }

    section .panel {
        margin-top: +15%;
    }
</style>
@endsection
