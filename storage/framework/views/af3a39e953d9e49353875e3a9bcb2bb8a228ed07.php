<?php $__env->startSection('links'); ?>
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span
            class="hidden-xs"> <?php echo app('translator')->get('fields.gtElect'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('JS'); ?>
    <script src="<?php echo e(asset('assets/js/fine-uploader.core.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/fine-uploader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.fine-uploader.core.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="col-xs-12">
                <h1><?php echo app('translator')->get('fields.welcome'); ?>,
                    <small><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></small>
                </h1>
            </div>

            <div class="col-xs-5 col-md-3">
                    <img src="<?php echo e(asset('/img/default-user.png')); ?>" alt="Default Userpicture"
                         class="img-thumbnail img-circle img-responsive"/>
                <a href="#" data-action="cropUpload" class="icon icon-upload btn btn-default btn-circle" id="upload"></a>
            </div>
            <div class="col-xs-7 col-md-6 col-md-offset-1">
                <div class="form-group row">
                    <label class="col-md-4 control-label"><?php echo app('translator')->get('fields.name'); ?></label>
                    <div class="col-md-8">
                        <span><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label"><?php echo app('translator')->get('fields.matnr'); ?></label>
                    <div class="col-xs-12 col-md-8">
                        <span><?php echo e($user->matrnr); ?></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label"><?php echo app('translator')->get('fields.mail'); ?></label>
                    <div class="col-xs-12 col-md-8">
                        <span><?php echo e($user->email); ?></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-12 col-md-4 control-label"><?php echo app('translator')->get('fields.results'); ?></label>
                    <div class="col-xs-12 col-md-6">

                        <div class="btn-group btn-group-xs" role="group" aria-label="...">
                            <span class="btn btn-default disabled"><?php echo app('translator')->get('fields.noresult'); ?></span>
                            <span class="btn btn-danger icon icon-cross disabled"></span>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 hidden-md hidden-lg">
                        <a href="<?php echo e(url('/profile/edit')); ?>" class="icon icon-edit btn btn-default">
                            <?php echo app('translator')->get('fields.editProfile'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
                <a href="<?php echo e(url('/profile/edit')); ?>" class="icon icon-edit btn btn-default">
                    <?php echo app('translator')->get('fields.editProfile'); ?></a>
            </div>


            <div class="placeholder"></div>

            <hr/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped voting">
                    <thead>
                        <tr>
                            <th class="col-xs-3"><label><?php echo app('translator')->get('fields.ag'); ?></label></th>
                            <th><label><?php echo app('translator')->get('fields.valuta'); ?></label></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($ratings->count() == 0): ?>
                    <tfoot>
                    <tr>
                        <td colspan="2">
                            <label><?php echo app('translator')->get('fields.norating'); ?></label>
                        </td>
                    </tr>
                    </tfoot>
                    <?php else: ?>
                        <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php $__currentLoopData = $ags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($ag->id == $rating->workgroup): ?>
                                    <tr>
                                        <td>
                                            <div class="input-group pull-right hidden-xs hidden-sm">
                                                <span data-target="range" class="btn btn-default disabled"><?php echo e($rating->rating); ?></span>
                                            </div>
                                            <label> <?php echo e($ag->name); ?></label>
                                        </td>
                                        <td>
                                            <span class="progress-bar-zero" style="width: <?php echo e($rating->rating*9); ?>%;"></span>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <div class="pull-right"><label id="sum"></label></div>
                                    <label><?php echo app('translator')->get('fields.sum'); ?>:</label>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
                </table>

            </div>

        </div>
    </div>
</section>


<?php echo $__env->make('modals.forgot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('modals.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('modals.crop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>