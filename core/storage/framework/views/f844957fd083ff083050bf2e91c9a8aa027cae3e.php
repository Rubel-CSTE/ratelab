<?php $__env->startSection('content'); ?>
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">

        <?php echo $__env->make('admin.partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="body-wrapper">
            <div class="bodywrapper__inner">

                <?php echo $__env->make('admin.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('panel'); ?>

            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>