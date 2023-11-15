<?php $__env->startSection('content'); ?>
    <form class="edit-profile-form" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="custom--card">
            <div class="card-header bg--dark">
                <h5 class="text-white"><?php echo app('translator')->get('Profile Setting'); ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <div class="profile-thumb-wrapper">
                            <label><?php echo app('translator')->get('Image'); ?></label>
                            <div class="profile-thumb justify-content-center">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview"
                                        style="background-image: url('<?php echo e(getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile'))); ?>');">
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" />
                                        <label for="profilePicUpload1" class="btn btn--base mb-0"><i class="la la-camera"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div><!-- profile-thumb-wrapper end -->
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('First Name'); ?></label>
                            <div class="custom-icon-field">
                                <i class="la la-user"></i>
                                <input type="text" name="firstname" class="form--control"
                                    placeholder="<?php echo e(__($user->firstname)); ?>" value="<?php echo e(__($user->firstname)); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Last Name'); ?></label>
                            <div class="custom-icon-field">
                                <i class="la la-user"></i>
                                <input type="text" name="lastname" class="form--control"
                                    placeholder="<?php echo e(__($user->lastname)); ?>" value="<?php echo e(__($user->lastname)); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <label><?php echo app('translator')->get('Email'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-envelope"></i>
                            <input type="email" class="form--control" placeholder="<?php echo e(__($user->email)); ?>"
                                value="<?php echo e(__($user->email)); ?>" readonly>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <label><?php echo app('translator')->get('Mobile Number'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-phone"></i>
                            <input type="tel" name="#0" class="form--control" placeholder="<?php echo e($user->mobile); ?>"
                                value="<?php echo e($user->mobile); ?>" readonly>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <label><?php echo app('translator')->get('Address'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-map-marker-alt"></i>
                            <input type="text" name="address" class="form--control"
                                placeholder="<?php echo e(__($user->address->address)); ?>" value="<?php echo e(__($user->address->address)); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label><?php echo app('translator')->get('Country'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-globe"></i>
                            <input type="text" class="form--control" placeholder="<?php echo e(__($user->address->country)); ?>"
                                value="<?php echo e(__($user->address->country)); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label><?php echo app('translator')->get('State'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-map-signs"></i>
                            <input type="text" name="state" class="form--control"
                                placeholder="<?php echo e(__($user->address->state)); ?>" value="<?php echo e(__($user->address->state)); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label><?php echo app('translator')->get('City'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-map-pin"></i>
                            <input type="text" name="city" class="form--control"
                                placeholder="<?php echo e(__($user->address->city)); ?>" value="<?php echo e(__($user->address->city)); ?>">
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label><?php echo app('translator')->get('Zip Code'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-location-arrow"></i>
                            <input type="text" name="zip" class="form--control"
                                placeholder="<?php echo e(__($user->address->zip)); ?>" value="<?php echo e(__($user->address->zip)); ?>">
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <label><?php echo app('translator')->get('About'); ?></label>
                        <div class="custom-icon-field">
                            <i class="la la-address-card"></i>
                            <textarea name="about" class="form--control" placeholder="<?php echo app('translator')->get('Write about....'); ?>"><?php echo e(__($user->about)); ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn--base w-100"> <?php echo app('translator')->get('Submit'); ?></button>
                </div><!-- row end -->
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function proPicURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = $(input).parents('.profile-thumb').find('.profilePicPreview');
                    $(preview).css('background-image', 'url(' + e.target.result + ')');
                    $(preview).addClass('has-image');
                    $(preview).hide();
                    $(preview).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".profilePicUpload").on('change', function() {
            proPicURL(this);
        });

        $(".remove-image").on('click', function() {
            $(".profilePicPreview").css('background-image', 'none');
            $(".profilePicPreview").removeClass('has-image');
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/user/profile_setting.blade.php ENDPATH**/ ?>