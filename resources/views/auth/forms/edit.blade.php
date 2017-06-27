<form class="form-horizontal" method="POST" action="{{ url('/profile/save') }}" name="edit">
    {{ csrf_field() }}
    <div class="container">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="edit.name" class="col-md-4 control-label">
                @lang('fields.name')
            </label>

            <div class="col-md-6">
                <input id="edit.name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} row">
            <label for="edit.lastname" class="col-md-4 control-label">@lang('fields.lastname')</label>

            <div class="col-md-6">
                <input id="edit.lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">

                @if ($errors->has('lastname'))
                <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('matrnr') ? ' has-error' : '' }} row">
            <label for="edit.matrnr" class="col-md-4 control-label">@lang('fields.matnr')</label>

            <div class="col-md-6">
                <input id="edit.matrnr" type="text" class="form-control" name="matrnr" value="{{ $user->matrnr }}">

                @if ($errors->has('matrnr'))
                <span class="help-block">
                            <strong>{{ $errors->first('matrnr') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="edit.email" class="col-md-4 control-label">@lang('fields.mail')</label>

            <div class="col-md-6">
                <input id="edit.email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <br>
        <div class="divider"></div>
        <br>


        <div class="form-group{{ $errors->has('.password') ? ' has-error' : '' }} row">
            <label for="edit.passwordold" class="col-md-4 control-label">@lang('fields.pswold')</label>

            <div class="col-md-6">
                <input id="edit.passwordold" type="password" class="form-control" name="passwordold">
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="password" class="col-md-4 control-label">@lang('fields.npassword')</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" minlength="8">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
            <label for="password-confirm" class="col-md-4 control-label">@lang('fields.cnPassword')</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="8">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="@lang('fields.save')">

                <input type="reset" class="btn btn-default" value="@lang('fields.reset')">

                <a href="{{ url('/dashboard') }}" data-dismiss="modal">
                    <div class="btn btn-link">
                        @lang('fields.back')
                    </div>
                </a>
            </div>
        </div>

    </div>

</form>