@extends('layouts.app')

@section('content')

    <section class="container-fluid">
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

    <section class="container">

        <h1>Willkommen</h1>

    </section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label>Footer</label>
            </div>
            <div class="col-md-6">
                <label>Social Media Buttons</label>
            </div>
        </div>
    </div>
</footer>

@include('modals.forgot')
@include('modals.register')

@endsection

