<?php $__env->startSection('content'); ?>

<section class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel">
                <!-- Default panel contents -->
                <div class="panel-heading"><label><?php echo e(config('app.name')); ?></label></div>
                <div class="panel-body">

                    <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('auth.forms.psw.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
    section {
        height: 100% !important;
    }

    section .panel {
        margin-top: +15%;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>