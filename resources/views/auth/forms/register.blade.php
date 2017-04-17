
<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
<div class="container-fluid">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="name" class="col-md-4 control-label">
                @lang('fields.name')
            </label>

            <div class="col-md-8">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="email" class="col-md-4 control-label">@lang('fields.mail')</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>


        <!-- Matrikelnummer: -->

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="password" class="col-md-4 control-label">@lang('fields.password')</label>

            <div class="col-md-8">
                <input id="password" type="password" data-toggle="popover"
                       data-placement="bottom" data-trigger="focus"
                       data-content="Hallo" class="form-control" name="password"
                       required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 control-label">@lang('fields.cPassword')</label>

            <div class="col-md-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary disabled" value="@lang('fields.register')">

                <a href="{{ url('/') }}" data-dismiss="modal">
                    <div class="btn btn-link">
                    @lang('fields.reset')
                    </div>
                </a>
            </div>
        </div>

</div>

</form>