<form class="form-horizontal" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
<div class="container-fluid">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="reg.name" class="col-md-4 control-label">
                @lang('fields.name')
            </label>

            <div class="col-md-8">
                <input id="reg.name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="reg.lastname" class="col-md-4 control-label">@lang('fields.lastname')</label>

            <div class="col-md-8">
                <input id="reg.lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                @if ($errors->has('lastname'))
                <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="reg.matnr" class="col-md-4 control-label">@lang('fields.matnr')</label>

            <div class="col-md-8">
                <input id="reg.matnr" type="text" class="form-control" name="matnr" value="{{ old('matnr') }}" required>

                @if ($errors->has('matnr'))
                <span class="help-block">
                            <strong>{{ $errors->first('matnr') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="reg.email" class="col-md-4 control-label">@lang('fields.mail')</label>

            <div class="col-md-8">
                <input id="reg.email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>


        <!-- Matrikelnummer: -->

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="reg.password" class="col-md-4 control-label">@lang('fields.password')</label>

            <div class="col-md-8">
                <input id="reg.password" type="password" class="form-control" name="password"
                       required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="reg.password-confirm" class="col-md-4 control-label">@lang('fields.cPassword')</label>

            <div class="col-md-8">
                <input id="reg.password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="@lang('fields.register')">

                <a href="{{ url('/') }}" data-dismiss="modal">
                    <div class="btn btn-link">
                    @lang('fields.reset')
                    </div>
                </a>
            </div>
        </div>

</div>

</form>