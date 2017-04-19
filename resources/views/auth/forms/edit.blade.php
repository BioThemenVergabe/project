<form class="form-horizontal" method="POST" action="{{ url('/profile/save') }}">
    {{ csrf_field() }}
    <div class="container-fluid">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="edit.name" class="col-md-3 control-label">
                @lang('fields.name')
            </label>

            <div class="col-md-9">
                <input id="edit.name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="edit.email" class="col-md-3 control-label">@lang('fields.mail')</label>

            <div class="col-md-9">
                <input id="edit.email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="passwordold" class="col-md-3 control-label">@lang('fields.pswold')</label>

            <div class="col-md-9">
                <input id="passwordold" type="password" data-toggle="popover"
                       data-placement="bottom" data-trigger="focus"
                       data-content="Hallo" class="form-control" name="passwordold"
                       required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="password" class="col-md-3 control-label">@lang('fields.password')</label>

            <div class="col-md-9">
                <input id="password" type="password" data-toggle="popover"
                       data-placement="bottom" data-trigger="focus"
                       data-content="Hallo" class="form-control" name="password"
                       required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-3 control-label">@lang('fields.cPassword')</label>

            <div class="col-md-9">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary disabled" value="@lang('fields.save')">

                <a href="{{ URL::previous() }}" data-dismiss="modal">
                    <div class="btn btn-link">
                        @lang('fields.reset')
                    </div>
                </a>
            </div>
        </div>

    </div>

</form>