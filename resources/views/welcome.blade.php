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

    <section id="infos">
        <div class="container welcome">
            <div class="row">
                <div class="col-xs-12">
                    <h1>@lang('fields.welcome')</h1>
                </div>
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
        <div id="impressum" class="container top-buffer-3">
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Impressum</h3>
                </div>
                <div class="col-xs-12">
                    <b>@lang('content.impr1')</b>
                    <div>Universität Konstanz</div>
                    <div>78457 Konstanz, Germany</div>
                    <div>Tel.: +49 (0)7531 / 88 - 0</div>
                    <div>Fax: +49 (0)7531 / 88 - 3688</div>
                    <div>Email: Posteingang@uni-konstanz.de</div>
                </div>
                <div class="col-xs-12">

                </div>
                <div class="col-xs-12 top-buffer">
                    <p>@lang('content.impr2')</p>
                </div>
            </div>
        </div>
    </section>


    @include('modals.forgot')

    @if($options->opened == 1)
        @include('modals.register')
    @endif

    @include('modals.cookie')

@endsection

