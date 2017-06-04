<<<<<<< HEAD
@extends('layouts.app')

@section('links')
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span
            class="hidden-xs"> @lang('fields.gtElect')</span></a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/dropzone.css') }}"/>

@endsection

@section('JS')
<script src="{{ asset('assets/js/dropzone.js') }}"></script>

<script>
    Dropzone.options.myDropzone = {
        accept: function (file, done) {
            console.log("uploaded");
            done();
        },
        init: function () {
            this.on("addedfile", function () {
                if (this.files[1] != null) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    };
    $(function () {
        var w = $('#userPicture').width('100%');
        $('#userPicture').height($('#userPicture').width());
    });
</script>
@endsection

@section('content')

@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.welcome'),
                    <small>{{$user->name}} {{$user->lastname}}</small>
                </h1>
            </div>

            <div class="col-md-3 hidden-xs hidden-sm">
                @if($user->user_picture == "")
                <div class="col-xs-12 img-thumbnail img-circle img-responsive" id="userPicture" style="background-image: url('{{ asset('/img/default-user.png') }}');">

                </div>
                <!-- <img src="{{ asset('/img/default-user.png') }}" id="userPicture" alt="Default Userpicture"
                     class="img-thumbnail img-circle img-responsive col-xs-12"/> -->
                @else
                <div class="col-xs-12 img-thumbnail img-circle img-responsive" id="userPicture" style="background-image: url('{{ asset('/img/uploads/'.$user->user_picture) }}');">

                </div>
                <!-- <img src="{{ asset('/img/uploads/'.$user->user_picture) }}" id="userPicture" alt="Default Userpicture"
                     class="img-thumbnail img-circle img-responsive"/> -->
                @endif
                <a href="#" data-action="cropUpload" class="icon icon-upload btn btn-default btn-circle"
                   id="upload"></a>
            </div>
            <div class="col-xs-7 col-md-6 col-md-offset-1">
                <div class="form-group row">
                    <label class="col-md-4 control-label">@lang('fields.name')</label>
                    <div class="col-md-8">
                        <span>{{$user->name}} {{$user->lastname}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.matnr')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>{{$user->matrnr}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.mail')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>{{$user->email}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.results')</label>
                    <div class="col-xs-12 col-md-6">

                        <div class="btn-group btn-group-xs" role="group" aria-label="...">
                            <span class="btn btn-default disabled">@lang('fields.noresult')</span>
                            <span class="btn btn-danger icon icon-cross disabled"></span>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 hidden-md hidden-lg">
                        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                            @lang('fields.editProfile')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                    @lang('fields.editProfile')</a>
            </div>


            <div class="placeholder"></div>

            <hr/>

            <h3>@lang('fields.yourRating')</h3>

            <div id="listRating">
                @if($ratings->count() == 0)
                <div class="bs-callout bs-danger">
                    <h4>
                        @lang('fields.noRating')
                    </h4>
                </div>
                @else
                @foreach($ratings as $key => $rating)
                @foreach($ags as $ag)
                @if($ag->id == $rating->workgroup)
                <div class="bs-callout">
                    <label>{{ $ag->name }}</label>
                </div>
                @if($key == 3)
                <hr class="hr-divider">
                @endif
                @endif
                @endforeach
                @endforeach
                @endif

            </div>

        </div>
    </div>
</section>

@include('modals.crop')

=======
@extends('layouts.app')

@section('links')
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span
            class="hidden-xs"> @lang('fields.gtElect')</span></a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/dropzone.css') }}"/>

@endsection

@section('JS')
<script src="{{ asset('assets/js/dropzone.js') }}"></script>

<script>
    Dropzone.options.myDropzone = {
        accept: function (file, done) {
            console.log("uploaded");
            done();
        },
        init: function () {
            this.on("addedfile", function () {
                if (this.files[1] != null) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    };
    $(function () {
        var w = $('#userPicture').width('100%');
        $('#userPicture').height(w);
    });
</script>
@endsection

@section('content')

@include('partials.header')

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1>@lang('fields.welcome'),
                    <small>{{$user->name}} {{$user->lastname}}</small>
                </h1>
            </div>

            <div class="col-md-3 hidden-xs hidden-sm">
                @if($user->user_picture == "")
                <img src="{{ asset('/img/default-user.png') }}" id="userPicture" alt="Default Userpicture"
                     class="img-thumbnail img-circle img-responsive col-xs-12"/>
                @else
                <img src="{{ asset('/img/uploads/'.$user->user_picture) }}" id="userPicture" alt="Default Userpicture"
                     class="img-thumbnail img-circle img-responsive"/>
                @endif
                <a href="#" data-action="cropUpload" class="icon icon-upload btn btn-default btn-circle"
                   id="upload"></a>
            </div>
            <div class="col-xs-7 col-md-6 col-md-offset-1">
                <div class="form-group row">
                    <label class="col-md-4 control-label">@lang('fields.name')</label>
                    <div class="col-md-8">
                        <span>{{$user->name}} {{$user->lastname}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.matnr')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>{{$user->matrnr}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.mail')</label>
                    <div class="col-xs-12 col-md-8">
                        <span>{{$user->email}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label">@lang('fields.results')</label>
                    <div class="col-xs-12 col-md-6">

                        <div class="btn-group btn-group-xs" role="group" aria-label="...">
                            <span class="btn btn-default disabled">@lang('fields.noresult')</span>
                            <span class="btn btn-danger icon icon-cross disabled"></span>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 hidden-md hidden-lg">
                        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                            @lang('fields.editProfile')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                    @lang('fields.editProfile')</a>
            </div>


            <div class="placeholder"></div>

            <hr/>

            <h3>@lang('fields.yourRating')</h3>

            <div id="listRating">
                @if($ratings->count() == 0)
                <div class="bs-callout bs-danger">
                    <h4>
                        @lang('fields.noRating')
                    </h4>
                </div>
                @else
                @foreach($ratings as $key => $rating)
                @foreach($ags as $ag)
                @if($ag->id == $rating->workgroup)
                <div class="bs-callout">
                    <label>{{ $ag->name }}</label>
                </div>
                @if($key == 3)
                <hr class="hr-divider">
                @endif
                @endif
                @endforeach
                @endforeach
                @endif

            </div>

        </div>
    </div>
</section>

@include('modals.crop')

>>>>>>> b790c7d21a7d6542bd584e09e4dd8223e779430c
@endsection