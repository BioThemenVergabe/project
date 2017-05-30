<?php $__env->startSection('links'); ?>
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"> <span
                class="hidden-xs"> <?php echo app('translator')->get('fields.ag'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="panel">
            <div class="panel-body">

                <!--Überschrift-->
                <div class="row">
                    <div class="col-xs-8">
                        <h1><?php echo app('translator')->get('content.heading_stud_be'); ?></h1>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="/admin_studenten">
                    <?php echo e(csrf_field()); ?>

                    <input style="display:none" type="text" name="id" value="<?php echo e($id); ?>">
                    <div class="form-group row">
                        <label for="edit.name" class="col-md-3 control-label">
                            <?php echo app('translator')->get('fields.name'); ?>
                        </label>

                        <div class="col-md-8">
                            <input id="edit.name" type="text" class="form-control" name="name"
                                   value="<?php echo e($vorname); ?>"
                                   required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit.lastname" class="col-md-3 control-label"><?php echo app('translator')->get('fields.lastname'); ?></label>

                        <div class="col-md-8">
                            <input id="edit.lastname" type="text" class="form-control" name="lastname"
                                   value="<?php echo e($nachname); ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit.matnr" class="col-md-3 control-label"><?php echo app('translator')->get('fields.matnr'); ?></label>

                        <div class="col-md-8">
                            <input id="edit.matnr" type="text" class="form-control" name="matnr"
                                   value="<?php echo e($matrnr); ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit.email" class="col-md-3 control-label"><?php echo app('translator')->get('fields.mail'); ?></label>

                        <div class="col-md-8">
                            <input id="edit.email" type="email" class="form-control" name="email"
                                   value="<?php echo e($email); ?>" required>
                        </div>
                    </div>
                    <div class="row top-buffer">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo app('translator')->get('fields.savechange'); ?>
                                </button>

                                <button type="reset" class="btn btn-default">
                                    <?php echo app('translator')->get('fields.reset'); ?>
                                </button>
                            </div>

                            <a href="/admin_studenten" class="btn btn-link">
                                <?php echo app('translator')->get('fields.cancel'); ?>
                            </a>
                        </div>
                    </div>
                    <hr class="top-buffer-3">
                    <div class="row top-buffer">
                        <div class="col-sm-3"><span id="Abg_Wahl" class="hidden-xs pull-right"><?php echo app('translator')->get('content.admin_sb1'); ?>
                                :</span></div>

                        <?php if($rated): ?>
                            <div class="col-sm-9">
                                <button id="bewertung_einsehen" type="button" class="btn btn-info icon icon-edit"
                                        data-toggle="modal"
                                        data-target="#AG_Wahl_Modal"> <?php echo app('translator')->get('content.admin_sb2'); ?>
                                </button>
                            </div>
                        <?php else: ?>
                            <div class="col-sm-9">
                                <button type="button" class="disabled btn">
                                    <?php echo app('translator')->get('content.admin_sb5'); ?>
                                </button>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="row top-buffer">
                        <div class="col-xs-4 col-sm-3"><span class="hidden-xs pull-right"><?php echo app('translator')->get('content.admin_sb3'); ?>
                                :</span><span
                                    class="visible-xs"><?php echo app('translator')->get('content.admin_sb3'); ?>':</span></div>

                        <div class="col-xs-8 col-sm-9">
                            <?php echo e($änderung); ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-3"><span class="hidden-xs pull-right"><?php echo app('translator')->get('content.admin_sb4'); ?>
                                :</span><span
                                    class="visible-xs"><?php echo app('translator')->get('content.admin_sb4'); ?>:</span></div>

                        <div class="col-xs-8 col-sm-9">
                            <?php echo e($registrierung); ?>

                        </div>
                    </div>
                </form>
            </div>
        </div><!-- Collapse Panel-->
    </div><!-- Collapse Container-->

    <!--AG-Wahl-Modal-->
    <?php echo $__env->make('modals.acp-stud-wahl', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--Speicher-Modal-->
    <?php echo $__env->make('modals.acp-save-rating', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>