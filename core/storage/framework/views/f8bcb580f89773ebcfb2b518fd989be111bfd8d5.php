<?php $__env->startSection('content'); ?>
<section class="pt-100 pb-100 contact-section overflow-hidden section--bg">
    <div class="shape-one"></div>
    <div class="shape-two"></div>
    <div class="shape-three"></div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
           
            <div class="card custom--card">
                <div class="card-header bg--dark">
                    <h5 class="card-title text-white"><?php echo e(__($pageTitle)); ?></h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('user.data.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('First Name'); ?></label>
                                <input type="text" class="form-control form--control" name="firstname" value="<?php echo e(old('firstname')); ?>" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('Last Name'); ?></label>
                                <input type="text" class="form-control form--control" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('Address'); ?></label>
                                <input type="text" class="form-control form--control" name="address" value="<?php echo e(old('address')); ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('State'); ?></label>
                                <input type="text" class="form-control form--control" name="state" value="<?php echo e(old('state')); ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('Zip Code'); ?></label>
                                <input type="text" class="form-control form--control" name="zip" value="<?php echo e(old('zip')); ?>">
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('City'); ?></label>
                                <input type="text" class="form-control form--control" name="city" value="<?php echo e(old('city')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--base w-100">
                                <?php echo app('translator')->get('Submit'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/user/user_data.blade.php ENDPATH**/ ?>