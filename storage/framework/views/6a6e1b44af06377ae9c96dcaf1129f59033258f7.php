<?php $__env->startSection('links'); ?>
<a href="/dashboard" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Startseite</span></a>
<a href="/wahl" class="btn btn-default btn-sm icon icon-line-graph"><span class="hidden-xs"> Zur Wahl</span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="container">

            <?php if($errors->has('password')): ?>
            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
            <?php endif; ?>

    <div class="panel">
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12">
                    <h1>Profil bearbeiten</h1>
                </div>
            </div>

            <div class="row">

                <?php echo $__env->make('auth.forms.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
        </div>
    </div>

</section>


<?php echo $__env->make('modals.forgot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>