@extends('layouts.admin')

@section('links')
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"><span
                class="hidden-xs"> @lang('fields.ag')</span></a>
@endsection

@section('content')

    <section class="container">
        <div class="panel">

            <div class="panel-body">
                <!--Überschrift-->
                <div class="row">
                    <div class="col-sm-8">
                        <h1>@lang('content.heading_stud')</h1>
                    </div>
                    <div class="col-sm-4 pull-right top-buffer-3">
                        <div class="input-group">
                            <input id="Stud_search_query" type="text" class="form-control"
                                   placeholder="@lang('fields.search')...">
                            <span class="input-group-btn">
                                <button id="Stud_search_button" class="btn btn-default" type="button"><span
                                            class="icon icon-magnifying-glass"></span></button>
                        </span>
                        </div>
                    </div>
                </div>

                <!--1.Zeile-->
                <div class="top-buffer row">
                    <div class="col-md-8">
                        @lang('content.stud1'): {{$numberStudents}}
                    </div>
                </div>

                <!--Studenten-Tabelle-->
                <div id="Stud_table" class="top-buffer-2 table-responsive">
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
                                             data-target="#löschStudentModal"><span
                                                    class="hidden-xs"> @lang('fields.del')</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--Collapse Studenten-Tabelle-->
            </div>
        </div><!--Collapse panel-->
    </section><!--Collapse container-->


    <!--Löschen-Modal-->
    @include('modals.acp-del-student')


@endsection