@extends('layouts.app')

@section('content')

<section class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel">
                <!-- Default panel contents -->
                @include('panels.heading')
                <div class="panel-body">

                        @include('auth.forms.login')

                </div>
            </div>
        </div>
    </div>

</section>
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