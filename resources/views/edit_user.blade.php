@extends('layouts.app')

@section('content')

<header>
    <div class="container">
        <div class="row">
            <div class="pull-right">
                <div class="btn-group" role="group" aria-label="...">
                    <a href="/dashboard" class="btn btn-default btn-sm icon icon-home"> Startseite</a>
                    <a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"> Zur Wahl</a>
                    @include('partials.lang')
                </div>
            </div>
            <label id="logo">{{ config('app.name') }}</label>
        </div>
    </div>
</header>

<section class="container">

    <div class="row">
        <div class="col-xs-12">
            <h1>Profil bearbeiten</h1>
        </div>
    </div>

    <div class="row">

        @include('auth.forms.edit')

    </div>

</section>


@include('modals.forgot')
@include('modals.register')

@endsection

