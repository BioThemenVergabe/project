<div class="modal fade" tabindex="-1" role="dialog" id="psw-reset">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">@lang('fields.pswreset')</h4>
            </div>
            <div class="modal-body">
                @include('auth.forms.psw.email')
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->