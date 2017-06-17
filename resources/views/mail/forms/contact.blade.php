{{ csrf_field() }}
<div class="container">
    <div class="form-group row">
        <label for="mail.name" class="col-md-4 control-label">
            @lang('fields.name')
        </label>

        <div class="col-md-3">
            <input id="mail.name" type="text" class="form-control" name="name" value="" placeholder="@lang('fields.name')" required>
        </div>
        <div class="col-md-3">
            <input id="mail.lastname" type="text" class="form-control" name="lastname" value="" placeholder="@lang('fields.lastname')" required>

        </div>
    </div>

    <div class="form-group row">
        <label for="mail.email" class="col-md-4 control-label">@lang('fields.mail')</label>

        <div class="col-md-6">
            <input id="mail.email" type="email" class="form-control" name="email" value="" required>
        </div>
    </div>

    <br>
    <div class="divider"></div>
    <br>

    <div class="form-group row">
        <label for="mail.message" class="col-md-4 control-label">@lang('fields.message')</label>

        <div class="col-md-6">
            <textarea id="mail.email" class="form-control" name="message" required></textarea>
        </div>
    </div>

</div>