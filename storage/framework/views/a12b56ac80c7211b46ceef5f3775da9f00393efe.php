<form class="form-horizontal" method="POST" action="<?php echo e(url('/password/email')); ?>">
    <?php echo e(csrf_field()); ?>

<div class="container-fluid">
    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> row">
        <label for="forgot.email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-8">
            <input id="forgot.email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

            <?php if($errors->has('email')): ?>
            <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-danger">
                <?php echo e(trans('auth.reset')); ?>

            </button>
        </div>
    </div>
</div>
</form>