<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php echo e($general->siteName(__($pageTitle))); ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo e(getImage(getFilePath('logoIcon') .'/favicon.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>">
   <!-- bootstrap 5  -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/custom.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/slick.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/color.php')); ?>?color=<?php echo e($general->base_color); ?>">

</head>
</head>

<body>

    <?php echo $__env->make($activeTemplate . 'partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--Main Content Section-->
    <?php echo $__env->yieldContent('content'); ?>
    <!--End Main Content Section-->

    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/main.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/bootstrap-fileinput.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <?php echo $__env->yieldPushContent('script'); ?>

    <script>
        (function($) {
            "use strict";
            $('form').on('submit', function() {
                if ($(this).valid()) {
                    $(':submit', this).attr('disabled', 'disabled');
                }
            });
        })(jQuery);
    </script>
</body>

</html>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/layouts/master.blade.php ENDPATH**/ ?>