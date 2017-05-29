<form class="form-horizontal" method="POST" action="<?php echo e(url('/register')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="container-fluid">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> row">
            <label for="reg.name" class="col-md-4 control-label">
                <?php echo app('translator')->get('fields.name'); ?>
            </label>

            <div class="col-md-8">
                <input id="reg.name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>

                <?php if($errors->has('name')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> row">
            <label for="reg.lastname" class="col-md-4 control-label"><?php echo app('translator')->get('fields.lastname'); ?></label>

            <div class="col-md-8">
                <input id="reg.lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required>

                <?php if($errors->has('lastname')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('lastname')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> row">
            <label for="reg.matnr" class="col-md-4 control-label"><?php echo app('translator')->get('fields.matnr'); ?></label>

            <div class="col-md-8">
                <input id="reg.matnr" type="text" class="form-control" name="matnr" value="<?php echo e(old('matnr')); ?>" required>

                <?php if($errors->has('matnr')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('matnr')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> row">
            <label for="reg.email" class="col-md-4 control-label"><?php echo app('translator')->get('fields.mail'); ?></label>

            <div class="col-md-8">
                <input id="reg.email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>


        <!-- Matrikelnummer: -->

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> row">
            <label for="reg.password" class="col-md-4 control-label"><?php echo app('translator')->get('fields.password'); ?></label>

            <div class="col-md-8">
                <input id="reg.password" type="password" class="form-control" name="password"
                       required>

                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="reg.password-confirm" class="col-md-4 control-label"><?php echo app('translator')->get('fields.cPassword'); ?></label>

            <div class="col-md-8">
                <input id="reg.password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('fields.register'); ?>">

                <a href="<?php echo e(url('/')); ?>" data-dismiss="modal">
                    <div class="btn btn-link">
                        <?php echo app('translator')->get('fields.reset'); ?>
                    </div>
                </a>
            </div>
        </div>

    </div>

</form>