<?php $__env->startSection('links'); ?>
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span
            class="hidden-xs"> <?php echo app('translator')->get('fields.gtElect'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/assets/css/fine-uploader-new.min.css')); ?>" />

<style>
    #trigger-upload {
        color: white;
        background-color: #00ABC7;
        font-size: 14px;
        padding: 7px 20px;
        background-image: none;
    }

    #fine-uploader-manual-trigger .qq-upload-button {
        margin-right: 15px;
    }

    #fine-uploader-manual-trigger .buttons {
        width: 36%;
    }

    #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
        width: 60%;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('JS'); ?>
<script src="<?php echo e(asset('assets/js/jquery.fine-uploader.min.js')); ?>"></script>

<script>
    $('#fine-uploader-manual-trigger').fineUploader({
        template: 'qq-template-manual-trigger',
        request: {
            endpoint: '/upload',
            customHeaders: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        thumbnails: {
            placeholders: {
                waitingPath: '/source/placeholders/waiting-generic.png',
                notAvailablePath: '/source/placeholders/not_available-generic.png'
            }
        },
        autoUpload: true,
        callbacks: {
            onError: function(id, name, errorReason) {
                alert(qq.format('Error on file number {} - {}. Reason: {}',id,name,errorReason));
            },
            onSubmitted: function(response) {
                alert(response);
            }
        }
    });

    $('#trigger-upload').click(function() {
        $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
    });
</script>

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

            <h3><?php echo app('translator')->get('fields.yourRating'); ?></h3>

            <div id="listRating">
                    <?php if($ratings->count() == 0): ?>
                    <div class="bs-callout bs-danger">
                        <h4>
                            <?php echo app('translator')->get('fields.noRating'); ?>
                        </h4>
                    </div>
                    <?php else: ?>
                        <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rating): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php $__currentLoopData = $ags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($ag->id == $rating->workgroup): ?>
                                    <div class="bs-callout">
                                        <label><?php echo e($ag->name); ?></label>
                                    </div>
                                    <?php if($key == 3): ?>
                                    <hr class="hr-divider">
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>

            </div>

        </div>
    </div>
</section>

<?php echo $__env->make('modals.crop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>