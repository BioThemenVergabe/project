<div class="modal fade" id="Begruessungstext_Modal" tabindex="-1" role="dialog"
     aria-labelledby="Begruessungstext_Modal_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="Begruessungstext_Modal_Label">@lang('content.modal_Begr1'): </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group">
                            <label for="begruessung">@lang('content.modal_Begr2'):</label>
                            <textarea class="form-control" rows="5" id="begruessung">@if(app()->getLocale() == "de"){{$welcomeDE}}@else{{$welcomeEN}}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="change_welcome" type="button" class="btn btn-primary" data-dismiss="modal">@lang('content.modal_Begr3')</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fields.cancel')</button>
            </div>
        </div>
    </div>
</div>