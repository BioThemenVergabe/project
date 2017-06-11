<div id="dashboard_alert" class="alert alert-warning alert-dismissable">
    <a id="close_alert" href="#" class="close" aria-label="close">&times;</a>
    @lang('content.admin_dashboard_alert')
    <ul>
        @foreach($notRatedStudents as $student)
            <li>
                {{$student->name." " . $student->lastname." (".$student->matrnr.")"}}
            </li>
        @endforeach
    </ul>
    @lang('content.admin_dashboard_alert3')
</div>