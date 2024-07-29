<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>

<?php $__env->startSection('main_content'); ?>

    <div id="app">
        <friend-request-component :received-requests="<?php echo e(json_encode($received_rs)); ?>" :sent-requests="<?php echo e(json_encode($sent_rs)); ?>"></friend-request-component>
    </div>

<?php $__env->stopSection(); ?>

</body>
</html>

<style>
</style>

<?php echo $__env->make('main_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/friend_requests.blade.php ENDPATH**/ ?>