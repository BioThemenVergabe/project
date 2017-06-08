<div class="modal fade" id="Wahlgang_beenden_Modal" tabindex="-1" role="dialog"
     aria-labelledby="Wahlgang_beenden_Modal_Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="Wahlgang_beenden_Modal_Label">@lang('content.modal_endel1') </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p>
                        @lang('content.modal_endel2')
                    </p>
                    @if($rated==true)
                        <p>
                            @lang('content.modal_endel3')
                        </p>
                        <p><a href="/admin_download_results">@lang('fields.downloadResults')</a></p>
                    @endif
                    <p>

                    </p>
                    <form id="end_election" action="admin_end_Election" method="post">
                        {{ csrf_field() }}
                        <label for="passwort1" class="control-label"> @lang('content.modal_endel5'): <input
                                    id="passwort1" name="param" type="password" required></label>
                        <button type="submit" class="btn btn-danger">@lang('content.modal_endel6')</button>
                    </form>
                    <hr>

                    <p class="top-buffer">
                        @lang('content.modal_endel7')
                    </p>
                    <form id="del_Ratings" action="admin_delete_ratings" method="post">
                        {{ csrf_field() }}
                        <label for="passwort2" class="control-label"> @lang('content.modal_endel5'): <input
                                    id="passwort2" name="param" type="password" required></label>
                        <button type="submit" class="btn btn-danger">@lang('content.modal_endel8')</button>
                    </form>
                    <hr>

                    <p class="top-buffer">
                        @lang('content.modal_endel9')
                    </p>
                    <form id="del_Assigned" action="admin_delete_assignments" method="post">
                        {{ csrf_field() }}
                        <label for="passwort3" class="control-label"> @lang('content.modal_endel5'): <input
                                    id="passwort3" name="param" type="password" required></label>
                        <button type="submit" class="btn btn-danger">@lang('content.modal_endel10')</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fields.cancel')</button>
            </div>
        </div>
    </div>
</div>