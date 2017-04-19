<form class="form-horizontal" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}
<div class="container-fluid">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
        <label for="forgot.email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-8">
            <input id="forgot.email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-danger">
                {{ trans('auth.reset') }}
            </button>
        </div>
    </div>
</div>
</form>