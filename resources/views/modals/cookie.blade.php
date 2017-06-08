<div class="modal fade" tabindex="-1" role="dialog" id="cookieMessage">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">@lang('fields.cookie')</h4>
            </div>
            <div class="modal-body bg-danger">
                <p>@lang('fields.cookieMessage')</p>
                <p>@lang('fields.whatCookies')</p>
                <p>@lang('fields.closeOnAccept')</p>
            </div>
            <div class="modal-footer bg-danger">
                <div class="pull-right">
                    <div class="btn btn-danger" id="accept" data-dismiss="modal"><span class="icon icon-success"></span> @lang('fields.accept')</div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->