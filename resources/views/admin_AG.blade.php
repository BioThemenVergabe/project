@extends('layouts.admin')

@section('links')
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"> <span
                class="hidden-xs"> @lang('fields.students')</span></a>
@endsection

@section('content')

    <section class="container">
        <div class="panel">
            <div class="panel-body">

                <!--Überschrift-->
                <div class="row">
                    <div class="col-xs-8">
                        <h1>@lang('content.heading_ag')</h1>
                    </div>
                    <div class="col-xs-4 pull-right top-buffer-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="@lang('fields.search')...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span
                                            class="icon icon-magnifying-glass"></span></button>
                            </span>
                        </div>
                    </div>
                </div>

                <!--1.Zeile-->
                <div class="top-buffer row">
                    <div class="col-xs-4">
                        @lang('content.ag1'): <span id="AG_anz">{{$numberGroups}}</span>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <button id="hinzufügen" onclick="anhaengen()" type="button"
                                class="btn btn-default btn-sm">@lang('fields.add') <span class="icon icon-plus"
                                                                                         aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <br>

                <!-- Alert für invalide AG-speichern-->
                @include('alerts.admin_ag')
                <!-- Alert für doppelten AG-namen speichern-->
                @include('alerts.admin_ag2')

                <!--AG-Tabelle-->
                <form action="/admin_AG_save" method="post" id="AG_form">
                    {{ csrf_field() }}
                </form>
                <div class="table-responsive" id="AG_table">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>@lang('fields.groupname')</th>
                            <th>@lang('fields.groupleader')</th>
                            <th>@lang('fields.spots')</th>
                            <th>@lang('fields.time')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index=0 ?>
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
                            <?php $index++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="last col-xs-6">
                    <button onclick="checkSave()" type="button" class="btn btn-primary pull-right">
                        @lang('fields.save')
                    </button>
                </div>
                <div class="col-xs-6">
                    <button onclick="location.href='/admin_AG';" type="button" class="btn btn-danger">
                        @lang('fields.reset')
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!--Speicher-Modal-->
    @include('modals.acp-save-ag')


    <!--Löschen-Modal-->
    @include('modals.acp-del-ag')

@endsection