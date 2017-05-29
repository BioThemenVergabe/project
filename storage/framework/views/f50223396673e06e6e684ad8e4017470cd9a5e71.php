<form class="form-horizontal" method="post" action="<?php echo e(url('/login')); ?>">
    <?php echo e(csrf_field()); ?>

<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    <label for="edit.email" class="col-md-4 control-label"><?php echo app('translator')->get('fields.mail'); ?></label>

    <div class="col-md-8">
        <input id="edit.email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

        <?php if($errors->has('email')): ?>
        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
        <?php endif; ?>
    </div>
</div>

<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
    <label for="edit.password" class="col-md-4 control-label"><?php echo app('translator')->get('fields.password'); ?></label>

    <div class="col-md-8">
        <input id="edit.password" type="password" class="form-control" name="password" required>

        <?php if($errors->has('password')): ?>
        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
        <?php endif; ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo app('translator')->get('fields.remember'); ?>
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <?php echo app('translator')->get('fields.login'); ?>
        </button>

        <a class="btn btn-link" data-action="register" href="<?php echo e(url('/register')); ?>">
            <?php echo app('translator')->get('fields.register'); ?>
        </a>

        <a class="btn btn-link" data-action="psw-reset" href="<?php echo e(url('/password/reset')); ?>">
            <?php echo app('translator')->get('fields.forgot'); ?>
        </a>
    </div>
</div>

</form>