<div class="modal fade" id="AG_Wahl_Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('content.modal_studWahl1'): <i>Student1</i></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-10">@lang('content.modal_studWahl2'):</div>
                        <div class="col-xs-2">x</div>
                    </div>
                    <div class="row top-buffer">
                        <table id="AG_Wahl_Modal_row" class="table table-striped">
                            <tr>
                                <th>AG</th>
                                <th>@lang('fields.groupleader')</th>
                                <th>@lang('content.modal_studWahl3')</th>
                            </tr>
                            <tr>
                                <td class="ag">AG1</td>
                                <td class="leiter">EinLeiter</td>
                                <td class="note"><input class="form-control" value="5"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="" type="button" class="btn btn-primary" data-dismiss="modal">@lang('fields.savechange')
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fields.cancel')</button>
            </div>
        </div>
    </div>
</div>