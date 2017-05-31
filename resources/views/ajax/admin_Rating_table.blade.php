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