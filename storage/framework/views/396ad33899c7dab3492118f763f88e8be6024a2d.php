<?php $__env->startSection('links'); ?>
    <a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"><span
                class="hidden-xs"> <?php echo app('translator')->get('fields.ag'); ?></span></a>
    <a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"><span
                class="hidden-xs"> <?php echo app('translator')->get('fields.students'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="container">
        <div class="panel">
            <div class="panel-body">
                <?php echo $__env->make('alerts.admin_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('alerts.admin_dashboard2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1>Dashboard</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 col-md-5 col-md-offset-3">
                        <?php echo app('translator')->get('content.admin_dash1'); ?>:
                    </div>
                    <div class="col-sm-4 col-md-4 pull-right">
                        <?php echo e($numberStudents); ?> <?php echo app('translator')->get('content.admin_dash2'); ?>
                    </div>
                </div>

                <?php if($noRating != 0): ?>
                    <div id="noRatings" class=" row">
                        <div class="col-sm-8 col-md-5 col-md-offset-3">
                            <?php echo app('translator')->get('content.admin_dash3'); ?>:
                        </div>
                        <div class="col-sm-4 col-md-4 pull-right">
                            <?php echo e($noRating); ?> <?php echo app('translator')->get('content.admin_dash2'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-sm-8 col-md-5 col-md-offset-3">
                        <?php echo app('translator')->get('content.admin_dash4'); ?>:
                    </div>
                    <div class="col-sm-4 col-md-4 pull-right">
                        <?php if($status=="open"): ?>
                            <?php echo app('translator')->get('content.admin_dash5'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('content.admin_dash6'); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8 col-md-5 col-md-offset-3">
                        <?php echo app('translator')->get('content.admin_dash7'); ?>:
                    </div>
                    <div id="rated" class="col-sm-4 col-md-4 pull-right">
                        <?php if($rated==false): ?>
                            <?php echo app('translator')->get('content.admin_dash8'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('content.admin_dash9'); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="top-buffer-2 row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button id="wahl_schliessen" type="button" class="btn btn-primary btn-block icon icon-block"
                                data-toggle="modal" data-target="#Wahl_schließen_öffnen"><span
                                    id="wahl_schliessen_text"> <?php echo app('translator')->get('fields.closeElect'); ?></span></button>
                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button id="start_Algo" type="button"
                                class="btn btn-primary btn-block icon icon-hour-glass"> <?php echo app('translator')->get('fields.startAlgo'); ?></button>
                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <?php if($rated==true): ?>
                            <a id="Ergebnisse_download" class="btn btn-primary btn-block icon icon-download"
                               href="/Ergebnisse.html" download> <?php echo app('translator')->get('fields.downloadResults'); ?>
                            </a>
                        <?php else: ?>
                            <button id="Ergebnisse_download_disabled"
                                    class="btn btn-primary btn-block icon icon-download  disabled"> <?php echo app('translator')->get('fields.downloadResults'); ?></button>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button type="button" class="btn btn-primary btn-block icon icon-edit" data-toggle="modal"
                                data-target="#Begruessungstext_Modal"> <?php echo app('translator')->get('fields.editText'); ?></button>
                    </div>
                </div>
                <div class="last top-buffer row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <button type="button" class="btn btn-primary btn-block icon icon-cross" data-toggle="modal"
                                data-target="#Wahlgang_beenden_Modal"> <?php echo app('translator')->get('fields.endElect1'); ?>
                            <br> <span id="achtung"> (<?php echo app('translator')->get('fields.endElect2'); ?>)</span></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('modals.acp-close-open-vote', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('modals.acp-begruessungstext', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('modals.acp-end-election', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('modals.acp-del-ratings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('modals.acp-start-algo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>