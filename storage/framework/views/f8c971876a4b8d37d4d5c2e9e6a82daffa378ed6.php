<div class="modal fade" id="speicherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('content.modal_saveAg1'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo app('translator')->get('content.modal_saveAg2'); ?>
            </div>
            <div class="modal-footer">
                <button id="save_ag_button" type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('fields.close'); ?></button>
            </div>
        </div>
    </div>
</div>