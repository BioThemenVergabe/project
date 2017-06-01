<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('JS'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="login_panel" class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel">
                <?php echo $__env->make('panels.heading', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="panel-body">
                    <?php echo $__env->make('auth.forms.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="bg-warning container-fluid" id="cookieWarning">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="icon icon-new"> Cookie hinweis</h1>
                <p>Diese Seite verwendet Cookies. Cookies sind keine Artefakte in Ihrem Browser, welche uns erlauben zu
                    erkennen, wenn Sie wieder auf diese Seite kommen.</p>
                <p>Cookies werden auf dieser Seite ausschließlich zur Nutzerwiedererkennung verwendet, nicht für
                    Marketingzwecke.</p>
                <div class="pull-right">
                    <div class="btn btn-primary" data-dismiss="cookieWarning">Akzeptieren</div>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="welcomemsg">
    <div class="container welcome">
        <p class="row">

        <h1><?php echo app('translator')->get('fields.welcome'); ?></h1>
        <?php if(app()->getLocale() == "de"): ?>
        <p class="col-xs-12"><?php echo e($welcome->de); ?></p>
        <?php else: ?>
        <p class="col-xs-12"><?php echo e($welcome->en); ?></p>
        <?php endif; ?>
    </div>
</section>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>