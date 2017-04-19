<form class="form-horizontal" action="{{ url('/dashboard') }}">
    {{ csrf_field() }}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="edit.email" class="col-md-4 control-label">@lang('fields.mail')</label>

    <div class="col-md-8">
        <input id="edit.email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="edit.password" class="col-md-4 control-label">@lang('fields.password')</label>

    <div class="col-md-8">
        <input id="edit.password" type="password" class="form-control" name="password" required>

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

        <a href="/admin" class="btn btn-link icon icon-key"></a>

        <a class="btn btn-link" data-action="register" href="{{ url('/register') }}">
            @lang('fields.register')
        </a>

        <a class="btn btn-link" data-action="psw-reset" href="{{ url('/password/reset') }}">
            @lang('fields.forgot')
        </a>
    </div>
</div>

</form>