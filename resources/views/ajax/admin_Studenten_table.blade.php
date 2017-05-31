<!--Studenten-Tabelle-->
<div class="top-buffer-2 table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Matr.Nr.</th>
            <th>Name</th>
            <th class="">AG</th>
            <th class="col-xs-4"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td class="id" style="display:none">{{$student->id}}</td>
                <td class="ma">{{$student->matrnr}}</td>
                <td class="na">{{$student->name . " " . $student->lastname}}</td>
                <td class="em" style="display:none">{{$student->email}}</td>
                @if(sizeof($student->zugewiesen)>0)
                    <td class="za">{{$student->zugewiesen}}</td>
                @else
                    <td class="za">-</td>
                @endif
                <td class="bt">
                    <div class="btn-group pull-right" role="group">
                        <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                    class="hidden-xs"> @lang('fields.edit')</span></div>
                        <div class="btn btn-danger löschStudentButton icon icon-cross"
                             data-toggle="modal"
                             data-target="#löschStudentModal"><span class="hidden-xs"> @lang('fields.del')</span>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!--Collapse Studenten-Tabelle-->