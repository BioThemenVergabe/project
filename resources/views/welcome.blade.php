@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

@section('JS')
@endsection

@section('content')

<section id="login_panel" class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel">
                @include('panels.heading')
                <div class="panel-body">
                    @include('auth.forms.login')
                </div>
            </div>
        </div>
    </div>
</section>

<section id="welcomemsg">
    <div class="container welcome">
        <p class="row">

        <h1>@lang('fields.welcome')</h1>
        @if(app()->getLocale() == "de")
        <p class="col-xs-12">{{ $options->welcomeDE }}</p>
        @else
        <p class="col-xs-12">{{ $options->welcomeEN }}</p>
        @endif
    </div>
</section>

@include('modals.forgot')
@include('modals.register')
@include('modals.cookie')

@endsection

