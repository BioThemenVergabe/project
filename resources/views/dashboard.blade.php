@extends('layouts.app')

@section('links')
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span
            class="hidden-xs"> @lang('fields.gtElect')</span></a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/fine-uploader-new.min.css') }}" />

<style>
    #trigger-upload {
        color: white;
        background-color: #00ABC7;
        font-size: 14px;
        padding: 7px 20px;
        background-image: none;
    }

    #fine-uploader-manual-trigger .qq-upload-button {
        margin-right: 15px;
    }

    #fine-uploader-manual-trigger .buttons {
        width: 36%;
    }

    #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
        width: 60%;
    }
</style>

@endsection

@section('JS')
<script src="{{ asset('assets/js/jquery.fine-uploader.min.js') }}"></script>

<script>
    $('#fine-uploader-manual-trigger').fineUploader({
        template: 'qq-template-manual-trigger',
        request: {
            endpoint: '/upload'
        },
        thumbnails: {
            placeholders: {
                waitingPath: '/source/placeholders/waiting-generic.png',
                notAvailablePath: '/source/placeholders/not_available-generic.png'
            }
        },
        autoUpload: true
    });

    $('#trigger-upload').click(function() {
        $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
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

            <div class="col-xs-5 col-md-3">
                    <img src="{{ asset('/img/default-user.png') }}" alt="Default Userpicture"
                         class="img-thumbnail img-circle img-responsive"/>
                <a href="#" data-action="cropUpload" class="icon icon-upload btn btn-default btn-circle" id="upload"></a>
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

@endsection