<?php echo app('translator')->get('Copyright'); ?> &copy; <?php echo e(\Carbon\Carbon::now()->format('Y')); ?> <a class="text--base" href="<?php echo e(route('home')); ?>"><?php echo e(@$general->site_name); ?>.</a> <?php echo app('translator')->get('All Right Reserved'); ?>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/partials/copyright_text.blade.php ENDPATH**/ ?>