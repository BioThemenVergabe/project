<div class="modal fade" id="löschStudentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="löschModalLabel">Möchten sie den Studenten wirklich löschen?</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table id="löschmodal-row" class="table table-striped">
                            <tr>
                                <th>Matr.Nr.</th>
                                <th>Name</th>
                                <th>AG</th>
                            </tr>
                            <tr id="insert-student">
                                <td class="ma"></td>
                                <td class="na"></td>
                                <td class="za"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="deleteStudentTrigger()" type="button" class="btn btn-danger" data-dismiss="modal">Löschen</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Nicht Löschen</button>
            </div>
        </div>
    </div>
</div>