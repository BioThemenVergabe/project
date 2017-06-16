<div class="modal fade" tabindex="-1" role="dialog" id="mailContact">
    <div class="modal-dialog" role="document">
        <form method="post" action="/contact/send">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('footer.mail')</h4>
                </div>
                <div class="modal-body">
                    @include('mail.forms.contact')
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="@lang('fields.send')">
                </div>

            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->