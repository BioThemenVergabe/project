<div class="modal" id="AG_Wahl_Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo app('translator')->get('content.modal_studWahl1'); ?>: <i><?php echo e($vorname ." ". $nachname); ?></i></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/admin_sb_save" method="post" id="Rating_form">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="studentID" value="<?php echo e($id); ?>">
                    </form>
                    <div class="row">
                        <div class="col-xs-10"><?php echo app('translator')->get('content.modal_studWahl2'); ?>:</div>
                        <div id="rDurchschnitt" class="col-xs-2"><?php echo e($averageRating); ?></div>
                    </div>
                    <div class="row top-buffer">
                        <table id="AG_Wahl_Modal_row" class="table table-striped">
                            <tr>
                                <th>AG</th>
                                <th><?php echo app('translator')->get('fields.groupleader'); ?></th>
                                <th><?php echo app('translator')->get('content.modal_studWahl3'); ?></th>
                                <th><?php echo app('translator')->get('fields.time'); ?></th>
                            </tr>
                            <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <input type="hidden" name="workgroupID[]" value="<?php echo e($rating->id); ?>" form="Rating_form">
                                    <td><?php echo e($rating->name); ?></td>
                                    <td><?php echo e($rating->groupLeader); ?></td>
                                    <td><input type="number" min="1" max="10" name="note[]" class="rating form-control" value="<?php echo e($rating->rating); ?>" form="Rating_form"/></td>
                                    <td><?php echo e($rating->date); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="validateRating()" type="button" class="btn btn-primary"><?php echo app('translator')->get('fields.savechange'); ?>
                </button>
                <button onclick="resetRating()" type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('fields.cancel'); ?></button>
            </div>
        </div>
    </div>
</div>