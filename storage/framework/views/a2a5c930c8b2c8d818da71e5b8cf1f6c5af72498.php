<?php $__env->startSection('links'); ?>
<a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span
            class="hidden-xs"> <?php echo app('translator')->get('fields.dashboard'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('JS'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function () {
        $('#sortableRatings').sortable({ cancel: '.hr-divider'});
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1><?php echo app('translator')->get('fields.selection'); ?></h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bs-callout bs-warning">
                            <h4>Hinweis</h4>
                            <p>Hier steht dann ein Hinweis zur Nutzung der nachfolgenden SortableListe.</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="hr-divider">

            <form method="post" name="wahl" action="<?php echo e(url('/wahl')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="ui-widget-content" id="sortableRatings">
                                <?php if($ratings->count() > 0): ?>
                                    <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rating): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php $__currentLoopData = $ags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if($ag->id == $rating->workgroup): ?>
                                                <div class="bs-callout">
                                                    <label><?php echo e($ag->name); ?></label>
                                                    <input type="hidden" name="ag[]" value="<?php echo e($ag->id); ?>">
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = $ags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class="bs-callout">
                                            <label><?php echo e($ag->name); ?></label>
                                            <input type="hidden" name="ag[]" value="<?php echo e($ag->id); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-primary icon icon-save" value="<?php echo app('translator')->get('fields.save'); ?>">
                    <input type="reset" class="btn btn-danger icon icon-cross" value="<?php echo app('translator')->get('fields.reset'); ?>">
                </div>

            </form>

        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="errorMsg">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><?php echo app('translator')->get('fields.error'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo app('translator')->get('fields.ratingToLow'); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>