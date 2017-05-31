<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('/assets/css/application.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/assets/css/toolkit-light.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo e(asset('/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/style-c.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('css'); ?>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/application.js')); ?>"></script>


    <?php echo $__env->yieldContent('JS'); ?>

</body>
</html>
