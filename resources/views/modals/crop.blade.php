<div class="modal fade" tabindex="-1" role="dialog" id="cropUpload">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">@lang('fields.upload')</h4>
            </div>
            <div class="modal-body">
                <div class="bs-callout bs-danger">
                    <h4>@lang('fields.notice')</h4>
                    <ul>
                        <li>@lang('fields.square')</li>
                    </ul>
                </div>
            </div>
            <div class="modal-body">
                <form action="/upload" class="dropzone" id="my-dropzone">
                    {{ csrf_field() }}
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->