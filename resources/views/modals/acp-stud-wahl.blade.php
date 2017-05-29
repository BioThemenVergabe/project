<div class="modal" id="AG_Wahl_Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('content.modal_studWahl1'): <i>{{$vorname ." ". $nachname}}</i></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/admin_sb_save" method="post" id="Rating_form">
                        {{ csrf_field() }}
                        <input type="hidden" name="studentID" value="{{$id}}">
                    </form>
                    <div class="row">
                        <div class="col-xs-10">@lang('content.modal_studWahl2'):</div>
                        <div id="rDurchschnitt" class="col-xs-2">{{$averageRating}}</div>
                    </div>
                    <div class="row top-buffer">
                        <table id="AG_Wahl_Modal_row" class="table table-striped">
                            <tr>
                                <th>AG</th>
                                <th>@lang('fields.groupleader')</th>
                                <th>@lang('content.modal_studWahl3')</th>
                                <th>@lang('fields.time')</th>
                            </tr>
                            @foreach($ratings as $rating)
                                <tr>
                                    <input type="hidden" name="workgroupID[]" value="{{$rating->id}}" form="Rating_form">
                                    <td>{{$rating->name}}</td>
                                    <td>{{$rating->groupLeader}}</td>
                                    <td><input type="number" min="1" max="10" name="note[]" class="rating form-control" value="{{$rating->rating}}" form="Rating_form"/></td>
                                    <td>{{$rating->date}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="validateRating()" type="button" class="btn btn-primary">@lang('fields.savechange')
                </button>
                <button onclick="resetRating()" type="button" class="btn btn-default" data-dismiss="modal">@lang('fields.cancel')</button>
            </div>
        </div>
    </div>
</div>