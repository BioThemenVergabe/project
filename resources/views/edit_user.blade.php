@extends('layouts.app')

@section('links')
<a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Startseite</span></a>
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span class="hidden-xs"> Zur Wahl</span></a>
@endsection

@section('JS')

@endsection

@section('content')

@include('partials.header')

<section class="container">

            @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif

    <div class="panel">
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12">
                    <h1>Profil bearbeiten</h1>
                </div>
            </div>

            <div class="row">

                @include('auth.forms.edit')


            </div>
        </div>
    </div>

</section>


@include('modals.forgot')
@include('modals.register')

@endsection

