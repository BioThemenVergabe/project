<div class="table-responsive" id="AG_table">
    <table id="AG_Table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>@lang('fields.groupname')</th>
            <th>@lang('fields.groupleader')</th>
            <th>@lang('fields.spots')</th>
            <th>@lang('fields.time')</th>
            <th>@lang('fields.delete')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td style="display:none"><input name="id[]" class="id" value="{{$group->id}}" form="AG_form"></td>
                <td><input name ="name[]" class="gn form-control" value="{{$group->name}}" form="AG_form"></td>
                <td><input name ="groupLeader[]" class="gl form-control" value="{{$group->groupLeader}}" form="AG_form"></td>
                <td><input name ="spots[]" class="pl form-control" type="number" value="{{$group->spots}}" form="AG_form"></td>
                <td><input name="date[]" class="zp form-control" value="{{$group->date}}" form="AG_form"></td>
                <td>
                    <button type="button" class="löschButton btn btn-default btn-xs form-control"
                            data-toggle="modal"
                            data-target="#löschModal"><span
                                class="icon icon-minus"></span></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if($numberRatings!=0)
    <script>
        //hinzufügen Button deaktivieren
        document.getElementById("hinzufügen").disabled = true;
    </script>
@endif