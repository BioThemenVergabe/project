@extends('layouts.app')

@section('links')

@endsection

@section('css')
<style>
    @for($i = 5; $i <= ($ags->count()+1) ; $i++)
    #listRating > div:nth-child({{$i}}):before {
        content:'{{ ($i-1) }}';
    }
    @endfor
</style>
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
                    this.files[0] = this.files[1];
                    this.removeFile(this.files[1]);
                }
            });
        }
    };
    $(function () {
        var w = $('#userPicture').width('100%');
        $('#userPicture').height($('#userPicture').innerWidth());
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

<!--
            <div class="col-md-3 hidden-xs hidden-sm">
                @if($user->user_picture == "")
                <div class="col-xs-12 img-thumbnail img-circle img-responsive" id="userPicture"
                     style="background-image: url('{{ asset('/img/default-user.png') }}');">

                </div>
                @else
                <div class="col-xs-12 img-thumbnail img-circle img-responsive" id="userPicture"
                     style="background-image: url('{{ asset('/img/uploads/'.$user->user_picture) }}');">

                </div>
                @endif
                <a href="#" data-action="cropUpload" class="icon icon-upload btn btn-default btn-circle"
                   id="upload"></a>
            </div>
            <div class="col-xs-12 col-md-6 col-md-offset-1">
-->
            <div class="col-xs-12 col-md-6 col-md-offset-4">
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
                            <span class="btn btn-default disabled">@if(is_null($result)) @lang('fields.noresult') @else {{ $result->name }}@endif</span>
                            @if(is_null($result))
                            <span class="btn btn-danger icon icon-cross disabled"></span>
                            @else
                            <span class="btn btn-success icon icon-check disabled"></span>
                            @endif
                        </div>

                    </div>
                </div>

                @if($options->opened == 0)
                <div class="form-group row">
                    <div class="col-xs-12 hidden-md hidden-lg">
                        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default disabled"
                           disabled>
                            @lang('fields.editProfile')</a>
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <div class="col-xs-12 hidden-md hidden-lg">
                        <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                            @lang('fields.editProfile')</a>
                    </div>
                </div>
                @endif
                @if($options->opened == 0)
                <div class="bs-callout bs-info">
                    <h4>@lang('rating.closed')</h4>
                    <p>@lang('rating.closedMsg')</p>
                </div>
                @else
                <div id="flex">
                    <a href="{{ url('/wahl') }}" class="btn btn-primary btn-lg icon icon-line-graph">
                        @lang('fields.gtElect')</a>
                </div>
                @endif

            </div>
            @if($options->opened == 0)
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default disabled" disabled>
                    @lang('fields.editProfile')</a>
            </div>
            @else
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="{{ url('/profile/edit') }}" class="icon icon-edit btn btn-default">
                    @lang('fields.editProfile')</a>
            </div>
            @endif


            <div class="placeholder"></div>

            <hr/>

            <h3>@lang('fields.yourRating')</h3>

            <div id="listRating">
                @if($ratings->count() == 0)
                <div class="bs-callout bs-info" id="noRating">
                    <h4>@lang('fields.noRating')</h4>
                </div>
                @else
                @foreach($ratings as $key => $rating)
                @foreach($ags as $ag)
                @if($ag->id == $rating->workgroup)
                <div class="bs-callout">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>{{ $ag->name }}</label>
                            </div>
                            <div class="col-xs-6">
                                <div class="pull-right">
                                    {{ $ag->date }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                {{ $ag->groupLeader }}
                            </div>
                            <div class="col-xs-6">
                                <div class="pull-right">
                                    {{ $ag->spots }} @lang('fields.spots')
                                </div>
                            </div>
                        </div>
                    </div>
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

@endsection
