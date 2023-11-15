<?php $__env->startSection('content'); ?>
<section class="pt-100 pb-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-5">
            <div class="contact-wrapper">
                <div class="card-body">
                    <div class="mb-4 border-bottom">
                        <p class="fw--bold"><?php echo app('translator')->get('Your account is verified successfully. Now you can change your password. Please enter a strong password and don\'t share it with anyone.'); ?></p>
                    </div>
                    <form method="POST" action="<?php echo e(route('user.password.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e($email); ?>">
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <div class="form-group">
                            <label class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                            <input type="password" class="form--control" name="password" required>
                            <?php if($general->secure_password): ?>
                                <div class="input-popup">
                                    <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                    <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                    <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                    <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                    <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                            <input type="password" class="form--control" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--base w-100"> <?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php if($general->secure_password): ?>
    <?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/user/auth/passwords/reset.blade.php ENDPATH**/ ?>