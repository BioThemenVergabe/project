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

