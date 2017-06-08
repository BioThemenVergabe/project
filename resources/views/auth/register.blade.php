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

@include('modals.cookie')

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
