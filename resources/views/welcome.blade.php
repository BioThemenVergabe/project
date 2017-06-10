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
            <div class="row">
                <h1>@lang('fields.welcome')</h1>
                @if(app()->getLocale() == "de")
                    <p id="welcome_text" class="col-xs-12">{{ $options->welcomeDE }}</p>
                @else
                    <p id="welcome_text" class="col-xs-12">{{ $options->welcomeEN }}</p>
                @endif
            </div>
            @if($options->opened ==0)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bs-callout bs-warning">
                            <h4>@lang('rating.closed')</h4>
                            <p>@lang('rating.closedMsg2')</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('modals.forgot')

@if($options->opened == 1)
    @include('modals.register')
@endif

    @include('modals.cookie')

@endsection

