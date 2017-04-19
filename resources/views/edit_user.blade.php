@extends('layouts.app')

@section('links')
<a href="/dashboard" class="btn btn-default btn-sm icon icon-home"> Startseite</a>
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"> Zur Wahl</a>
@endsection

@section('content')

@include('partials.header')

<section class="container">

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

