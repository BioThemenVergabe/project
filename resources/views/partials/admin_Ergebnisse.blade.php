<!--Studenten-Tabelle-->
<tr><th><u>Zuweisungs-Tabelle</u></th><th></th><th></th><td>Durchschnittliche Bewertung: </td><td>{{round($avgRating,2)}}</td></tr>
<table>
    <thead>
    <tr>
        <th>Matr.Nr.</th>
        <th>Name</th>
        <th>AG Name</th>
        <th>AG Leiter</th>
        <th>Bewertung</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{$student->matrnr}}</td>
            <td>{{$student->name . " " . $student->lastname}}</td>
            <td>{{$student->zugewiesen}}</td>
            <td>{{$student->leiter}}</td>
            <td>{{$student->rating}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<tr><td><hr></td></tr>
<tr><th><u>AG-Statistiken</u></th></tr>
<table>
    <thead>
    <tr>
        <th>AG Name</th>
        <th>AG Leiter</th>
        <th>durchschnittliche Bewertung</th>
        <th>belegte Plätze</th>
        <th>noch freie Plätze</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ags as $ag)
        <tr>
            <td>{{$ag->wName}}</td>
            <td>{{$ag->leiter}}</td>
            <td>{{round($ag->avgRating,2)}}</td>
            <td>{{$ag->belegt}}</td>
            <td>{{$ag->plätze-$ag->belegt}}</td>
        </tr>
    @endforeach
    </tbody>
</table>