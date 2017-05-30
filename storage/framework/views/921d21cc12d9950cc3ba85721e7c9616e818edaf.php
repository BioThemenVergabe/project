<form class="form-horizontal" method="POST" action="<?php echo e(url('/profile/save')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="container">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> row">
            <label for="edit.name" class="col-md-4 control-label">
                <?php echo app('translator')->get('fields.name'); ?>
            </label>

            <div class="col-md-6">
                <input id="edit.name" type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?> row">
            <label for="edit.lastname" class="col-md-4 control-label"><?php echo app('translator')->get('fields.lastname'); ?></label>

            <div class="col-md-6">
                <input id="edit.lastname" type="text" class="form-control" name="lastname" value="<?php echo e($user->lastname); ?>">

                <?php if($errors->has('lastname')): ?>
                <span class="help-block">
                            <strong><?php echo e($errors->first('lastname')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('matnr') ? ' has-error' : ''); ?> row">
            <label for="edit.matnr" class="col-md-4 control-label"><?php echo app('translator')->get('fields.matnr'); ?></label>

            <div class="col-md-6">
                <input id="edit.matnr" type="text" class="form-control" name="matnr" value="<?php echo e($user->matrnr); ?>">

                <?php if($errors->has('matnr')): ?>
                <span class="help-block">
                            <strong><?php echo e($errors->first('matnr')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> row">
            <label for="edit.email" class="col-md-4 control-label"><?php echo app('translator')->get('fields.mail'); ?></label>

            <div class="col-md-6">
                <input id="edit.email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>">
            </div>
        </div>

        <br>
        <div class="divider"></div>
        <br>


        <div class="form-group<?php echo e($errors->has('.password') ? ' has-error' : ''); ?> row">
            <label for="edit.passwordold" class="col-md-4 control-label"><?php echo app('translator')->get('fields.pswold'); ?></label>

            <div class="col-md-6">
                <input id="edit.passwordold" type="password" class="form-control" name="passwordold">
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> row">
            <label for="password" class="col-md-4 control-label"><?php echo app('translator')->get('fields.password'); ?></label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?> row">
            <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->get('fields.cPassword'); ?></label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('fields.save'); ?>">

                <input type="reset" class="btn btn-default" value="<?php echo app('translator')->get('fields.reset'); ?>">

                <a href="<?php echo e(URL::previous()); ?>" data-dismiss="modal">
                    <div class="btn btn-link">
                        <?php echo app('translator')->get('fields.back'); ?>
                    </div>
                </a>
            </div>
        </div>

    </div>

</form>