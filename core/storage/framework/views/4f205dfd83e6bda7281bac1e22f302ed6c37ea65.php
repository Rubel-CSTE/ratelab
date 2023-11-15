<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo e($general->siteName(__($pageTitle))); ?></title>
    <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="icon" type="image/png" href=" <?php echo e(getImage(getFilePath('logoIcon'). '/favicon.png')); ?>" sizes="16x16" alt="<?php echo e(__($general->site_name)); ?>">

    <!--CSS Blade Section-->
   <!-- bootstrap 5  -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
   <!-- fontawesome 5  -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">
   <!-- line-awesome webfont -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>">
  <!-- slick slider css -->
  <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/slick.css')); ?>">
  <!-- main css -->
  <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/main.css')); ?>">
   <!--End CSS Blade Section-->
   <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/custom.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/color.php')); ?>?color=<?php echo e($general->base_color); ?>&secondColor=<?php echo e($general->secondary_color); ?>" rel="stylesheet">

</head>

<body>
    <!-- scroll-to-top start -->
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="las la-arrow-up"></i>
        </span>
    </div>
    <!-- scroll-to-top end -->

    <!-- preloader start -->
    <?php echo $__env->make($activeTemplate."partials.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- preloader end -->

    <!-- header-section start  -->
    <?php echo $__env->make($activeTemplate."partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- header-section end  -->

    <?php
        $content = getContent('breadcrumb.content', true);
    ?>

    <div class="main-wrapper">
        <div class="profile-bg bg_img" style="background-image: url('<?php echo e(getImage('assets/images/frontend/breadcrumb/' . @$content->data_values->image, '1920x840')); ?>');">
        </div>
        <div class="profile-header">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <nav class="profile-nav">
                            <ul class="profile-menu">
                                <?php if(auth()->user()->reviews->count()): ?>
                                <li class="profile-menu__item <?php echo e(menuActive('user.home')); ?>">
                                    <a href="<?php echo e(route('user.home')); ?>" class="profile-menu__link">
                                        <i class="las la-star"></i> <?php echo app('translator')->get("Reviews"); ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li class="profile-menu__item <?php echo e(menuActive('user.profile.setting')); ?>">
                                    <a href="<?php echo e(route('user.profile.setting')); ?>" class="profile-menu__link">
                                        <i class="las la-user-cog"></i> <?php echo app('translator')->get("Profile"); ?>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div><!-- profile-header end -->

        <div class="pt-50 pb-50 section--bg">
            <div class="container">
                <div class="row justify-content-between flex-row-reverse">
                    <div class="col-xl-3 col-lg-4 order-1">
                        <?php echo $__env->make($activeTemplate."partials.user_left_nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-9 col-lg-8 order-0">

                        

                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- dashboard section end -->
    </div><!-- main-wrapper end -->

    <!-- footer section start -->
    <?php echo $__env->make($activeTemplate."partials.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- footer section end -->

    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <!-- jQuery library -->
   <script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
   <!-- bootstrap js -->
   <script src="<?php echo e(asset($activeTemplateTrue . 'js/bootstrap.bundle.min.js')); ?>"></script>
   <!-- slick slider js -->
   <script src="<?php echo e(asset($activeTemplateTrue . 'js/slick.min.js')); ?>"></script>
   <!-- wow js  -->
   <script src="<?php echo e(asset($activeTemplateTrue . 'js/wow.min.js')); ?>"></script>
   <!-- main js -->
   <script src="<?php echo e(asset($activeTemplateTrue . 'js/main.js')); ?>"></script>
   <script src="<?php echo e(asset($activeTemplateTrue . 'js/bootstrap-fileinput.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <?php echo $__env->yieldPushContent('script'); ?>

</body>
</html>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/layouts/auth.blade.php ENDPATH**/ ?>