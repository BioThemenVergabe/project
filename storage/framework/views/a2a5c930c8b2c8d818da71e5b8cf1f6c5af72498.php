<?php $__env->startSection('links'); ?>
    <a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> <?php echo app('translator')->get('fields.dashboard'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('JS'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1><?php echo app('translator')->get('fields.selection'); ?></h1>
            </div>

            <form method="post" name="wahl" action="<?php echo e(url('/wahl')); ?>">
                <?php echo e(csrf_field()); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="col-xs-6 col-md-3"><label><?php echo app('translator')->get('fields.ag'); ?></label></th>
                        <th><label><?php echo app('translator')->get('fields.valuta'); ?></label></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $ags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                        <tr data-row="ag-<?php echo e($ag->id); ?>">
                            <td>
                                <div class="input-group pull-right hidden-xs hidden-sm">
                                    <span data-target="range" class="btn btn-default disabled"></span>
                                </div>
                                <label><?php echo e($ag->name); ?></label>
                            </td>
                            <td>
                                <div class="form-group hidden-md hidden-lg">
                                    <input type="number" class="form-control copyOf" data-copy="range" min="1" max="10">
                                </div>
                                <div class="input-group input-group-sm hidden-xs hidden-sm">
                                    <span class="input-group-addon">1</span>
                                    <input type="range" name="ag-<?php echo e($ag->id); ?>" id="ag-<?php echo e($ag->id); ?>" <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($rating->workgroup == $ag->id): ?> value="<?php echo e($rating->rating); ?>" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> class="form-control ag-values" min="1" max="10">
                                    <span class="input-group-addon">10</span>
                                </div>
                            </td>
                        </tr>

                        <tr data-row-copy="ag-<?php echo e($ag->id); ?>" class="hidden-md hidden-lg">
                            <td colspan="2">
                                <div class="input-group input-group-sm col-xs-12">
                                    <span class="input-group-addon">1</span>
                                    <input type="range" name="ag-<?php echo e($ag->id); ?>" data-copy="ag-<?php echo e($ag->id); ?>" value="5" class="form-control" min="1" max="10">
                                    <span class="input-group-addon">10</span>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                    </tbody>
                    <tfoot>
                    <tr>
                        <td>
                            <div class="pull-right"><label id="sum"></label></div>
                            <label><?php echo app('translator')->get('fields.sum'); ?>:</label>
                        </td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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