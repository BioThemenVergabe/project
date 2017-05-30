<header>
    <div class="container">
        <div class="row">
            <nav class="pull-right">
                <div class="btn-group" role="group" aria-label="...">
                    <?php echo $__env->yieldContent('links'); ?>
                    <?php echo $__env->make('partials.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <a href="/logout" title="<?php echo app('translator')->get('fields.signout'); ?>" class="btn btn-danger btn-sm icon icon-log-out"></a>
                </div>
            </nav>
            <label id="logo"><a href="<?php echo e(url('/redirect')); ?>"><span class="hidden-xs hidden-sm"><?php echo e(config('app.name')); ?></span>&nbsp;</a></label>
        </div>
    </div>
</header>