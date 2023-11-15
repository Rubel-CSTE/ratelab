<?php $__env->startSection('content'); ?>
<section class="pt-100 pb-100">
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="verification-code-wrapper contact-wrapper">
            <div class="verification-area">
                <h5 class="pb-3 text-center border-bottom"><?php echo app('translator')->get('Verify Mobile Number'); ?></h5>
                <form action="<?php echo e(route('user.verify.mobile')); ?>" method="POST" class="submit-form">
                    <?php echo csrf_field(); ?>
                    <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your mobile number'); ?> :  +<?php echo e(showMobileNumber(auth()->user()->mobile)); ?></p>
                    <?php echo $__env->make($activeTemplate.'partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="mb-3">
                        <button type="submit" class="btn btn--base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                    <div class="form-group">
                        <p>
                            <?php echo app('translator')->get('If you don\'t get any code'); ?>, <a href="<?php echo e(route('user.send.verify.code', 'phone')); ?>" class="forget-pass"> <?php echo app('translator')->get('Try again'); ?></a>
                        </p>
                        <?php if($errors->has('resend')): ?>
                            <br/>
                            <small class="text-danger"><?php echo e($errors->first('resend')); ?></small>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate .'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/user/auth/authorization/sms.blade.php ENDPATH**/ ?>