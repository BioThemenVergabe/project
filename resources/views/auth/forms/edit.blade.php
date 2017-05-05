<form class="form-horizontal" method="POST" action="{{ url('/profile/save') }}">
    {{ csrf_field() }}
    <div class="container">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="edit.name" class="col-md-4 control-label">
                @lang('fields.name')
            </label>

            <div class="col-md-6">
                <input id="edit.name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} row">
            <label for="edit.lastname" class="col-md-4 control-label">@lang('fields.lastname')</label>

            <div class="col-md-6">
                <input id="edit.lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required>

                @if ($errors->has('lastname'))
                <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('matnr') ? ' has-error' : '' }} row">
            <label for="edit.matnr" class="col-md-4 control-label">@lang('fields.matnr')</label>

            <div class="col-md-6">
                <input id="edit.matnr" type="text" class="form-control" name="matnr" value="{{ $user->matrnr }}">

                @if ($errors->has('matnr'))
                <span class="help-block">
                            <strong>{{ $errors->first('matnr') }}</strong>
                        </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="edit.email" class="col-md-4 control-label">@lang('fields.mail')</label>

            <div class="col-md-6">
                <input id="edit.email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('.password') ? ' has-error' : '' }} row">
            <label for="edit.passwordold" class="col-md-4 control-label">@lang('fields.pswold')</label>

            <div class="col-md-6">
                <input id="edit.passwordold" type="password" class="form-control" name="passwordold"
                       required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="password" class="col-md-4 control-label">@lang('fields.password')</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password"
                       required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 control-label">@lang('fields.cPassword')</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="@lang('fields.save')">

                <a href="{{ URL::previous() }}" data-dismiss="modal">
                    <div class="btn btn-link">
                        @lang('fields.reset')
                    </div>
                </a>
            </div>
        </div>

    </div>

</form>