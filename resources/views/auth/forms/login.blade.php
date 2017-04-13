<form class="form-horizontal" method="post" action="{{ url('/hallo') }}">
    {{ csrf_field() }}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">@lang('fields.mail')</label>

    <div class="col-md-8">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">@lang('fields.password')</label>

    <div class="col-md-8">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> @lang('fields.remember')
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            @lang('fields.login')
        </button>

        <a class="btn btn-link" data-action="register" href="{{ url('/register') }}">
            @lang('fields.register')
        </a>

        <a class="btn btn-link" data-action="psw-reset" href="{{ url('/password/reset') }}">
            @lang('fields.forgot')
        </a>
    </div>
</div>

</form>