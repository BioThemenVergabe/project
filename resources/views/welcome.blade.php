@extends('layouts.app')

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="panel">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger lang lang-de"></button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                        <label>{{ config('app.name') }}</label>
                    </div>
                    <div class="panel-body">

                            @include('auth.forms.login')
                        </form>

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

