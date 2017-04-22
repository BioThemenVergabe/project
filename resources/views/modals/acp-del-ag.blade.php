<div class="modal fade" id="löschModal" tabindex="-1" role="dialog" aria-labelledby="löschModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="löschModalLabel">Möchten sie die wirklich AG löschen?</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table id="löschmodal-row" class="table table-striped">
                            <tr>
                                <th>Gruppenleiter</th>
                                <th>Gruppenname</th>
                                <th>Plätze</th>
                                <th>(Zeitpunkt)</th>
                            </tr>
                            <tr id="insert-ag">
                                <td class="gl"></td>
                                <td class="gn"></td>
                                <td class="pl"></td>
                                <td class="zp"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="deleteTrigger()" type="button" class="btn btn-danger"
                        data-dismiss="modal">Löschen
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Nicht Löschen
                </button>
            </div>
        </div>
    </div>
</div>