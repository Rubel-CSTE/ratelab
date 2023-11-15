<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo e($general->siteName(__($pageTitle))); ?></title>

    <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- bootstrap 5  -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/color.php')); ?>?color=<?php echo e($general->base_color); ?>">

    <?php echo $__env->yieldPushContent('style-lib'); ?>

    <?php echo $__env->yieldPushContent('style'); ?>

</head>

<body>
    <?php echo $__env->yieldPushContent('fbComment'); ?>
    <!-- scroll-to-top -->
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="las la-arrow-up"></i>
        </span>
    </div>

    <?php echo $__env->make($activeTemplate . 'partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make($activeTemplate . 'partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-wrapper">
        <?php if(!request()->routeIs('home') && !request()->routeIs('user.home') && !request()->routeIs('company.details')): ?>
            <?php echo $__env->make($activeTemplate . 'partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>

    </div><!-- main-wrapper end -->


    <?php
        $cookie = App\Models\Frontend::where('data_keys', 'cookie.data')->first();
    ?>
    <?php if($cookie->data_values->status == Status::ENABLE && !\Cookie::get('gdpr_cookie')): ?>
        <!-- cookies dark version start -->
        <div class="cookies-card text-center">
            <div class="cookies-card__icon bg--base">
                <i class="las la-cookie-bite"></i>
            </div>
            <p class="mt-4 cookies-card__content"><?php echo e($cookie->data_values->short_desc); ?> <a
                    href="<?php echo e(route('cookie.policy')); ?>" target="_blank"><?php echo app('translator')->get('learn more'); ?></a></p>
            <div class="cookies-card__btn mt-4">
                <a href="javascript:void(0)" class="btn btn--base w-100 policy"><?php echo app('translator')->get('Allow'); ?></a>
            </div>
        </div>
        <!-- cookies dark version end -->
    <?php endif; ?>



    <?php echo $__env->make($activeTemplate . 'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        "use strit";
        (function($) {
            //===============here is the update add click value=========
            $(".__add").on('click', function(e) {
                e.preventDefault()
                let id = $(this).data('id');
                let action = "<?php echo e(route('add.click', ':id')); ?>";

                $.ajax({
                    url: action.replace(':id', id),
                    type: "GET",
                    dataType: 'json',
                    cache: false,
                    success: function(resp) {
                        if (resp.data && resp.data.type == 'image' && resp.data.redirect_url !=
                            '#') {
                            window.open(resp.data.redirect_url)
                        }
                    }
                });
            })

            //Language
            $(".langSel").on("change", function() {
                window.location.href = "<?php echo e(route('home')); ?>/change/" + $(this).val();
            });


            $('#allow-cookie').on('click', function() {
                var url = `<?php echo e(route('cookie.accept')); ?>`;
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        $('.cookie-wrapper').hide();
                        notify('success', 'Cookie accepted successfully');
                    }
                });
            });


            $('.policy').on('click', function() {
                $.get('<?php echo e(route('cookie.accept')); ?>', function(response) {
                    $('.cookies-card').addClass('d-none');
                    notify('success', 'Cookie accepted successfully');
                });
            });

            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);


        })(jQuery);
    </script>
</body>

</html>
<?php /**PATH D:\wamp64\www\fxbrokeview\core\resources\views/templates/basic/layouts/frontend.blade.php ENDPATH**/ ?>