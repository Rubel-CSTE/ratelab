<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-12">

            <div class="d-flex flex-wrap gap-3 mt-4">

                <div class="flex-fill">
                    <a href="<?php echo e(route('admin.report.login.history')); ?>?search=<?php echo e($user->username); ?>"
                        class="btn btn--primary btn--shadow w-100 btn-lg">
                        <i class="las la-list-alt"></i><?php echo app('translator')->get('Logins'); ?>
                    </a>
                </div>

                <div class="flex-fill">
                    <a href="<?php echo e(route('admin.users.notification.log', $user->id)); ?>"
                        class="btn btn--secondary btn--shadow w-100 btn-lg">
                        <i class="las la-bell"></i><?php echo app('translator')->get('Notifications'); ?>
                    </a>
                </div>

                <div class="flex-fill">
                    <a href="<?php echo e(route('admin.users.login', $user->id)); ?>" target="_blank"
                        class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg">
                        <i class="las la-sign-in-alt"></i><?php echo app('translator')->get('Login as User'); ?>
                    </a>
                </div>


                <div class="flex-fill">
                    <?php if($user->status == Status::USER_ACTIVE): ?>
                        <button type="button" class="btn btn--warning btn--gradi btn--shadow w-100 btn-lg userStatus"
                            data-bs-toggle="modal" data-bs-target="#userStatusModal">
                            <i class="las la-ban"></i><?php echo app('translator')->get('Ban User'); ?>
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn btn--success btn--gradi btn--shadow w-100 btn-lg userStatus"
                            data-bs-toggle="modal" data-bs-target="#userStatusModal">
                            <i class="las la-undo"></i><?php echo app('translator')->get('Unban User'); ?>
                        </button>
                    <?php endif; ?>
                </div>
            </div>


            <div class="card mt-30">
                <div class="card-header">
                    <h5 class="card-title mb-0"><?php echo app('translator')->get('Information of'); ?> <?php echo e($user->fullname); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.users.update', [$user->id])); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('First Name'); ?></label>
                                    <input class="form-control" type="text" name="firstname" required
                                        value="<?php echo e($user->firstname); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label"><?php echo app('translator')->get('Last Name'); ?></label>
                                    <input class="form-control" type="text" name="lastname" required
                                        value="<?php echo e($user->lastname); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Email'); ?> </label>
                                    <input class="form-control" type="email" name="email" value="<?php echo e($user->email); ?>"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Mobile Number'); ?> </label>
                                    <div class="input-group ">
                                        <span class="input-group-text mobile-code"></span>
                                        <input type="number" name="mobile" value="<?php echo e(old('mobile')); ?>" id="mobile"
                                            class="form-control checkUser" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Address'); ?></label>
                                    <input class="form-control" type="text" name="address"
                                        value="<?php echo e(@$user->address->address); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('City'); ?></label>
                                    <input class="form-control" type="text" name="city"
                                        value="<?php echo e(@$user->address->city); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('State'); ?></label>
                                    <input class="form-control" type="text" name="state"
                                        value="<?php echo e(@$user->address->state); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Zip/Postal'); ?></label>
                                    <input class="form-control" type="text" name="zip"
                                        value="<?php echo e(@$user->address->zip); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Country'); ?></label>
                                    <select name="country" class="form-control">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-mobile_code="<?php echo e($country->dial_code); ?>"
                                                value="<?php echo e($key); ?>"><?php echo e(__($country->country)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label><?php echo app('translator')->get('Email Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                    data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>"
                                    name="ev" <?php if($user->ev): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label><?php echo app('translator')->get('Mobile Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                    data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>"
                                    name="sv" <?php if($user->sv): ?> checked <?php endif; ?>>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div id="userStatusModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <?php if($user->status == Status::USER_ACTIVE): ?>
                            <span><?php echo app('translator')->get('Ban User'); ?></span>
                        <?php else: ?>
                            <span><?php echo app('translator')->get('Unban User'); ?></span>
                        <?php endif; ?>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.users.status', $user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <?php if($user->status == Status::USER_ACTIVE): ?>
                            <h6 class="mb-2"><?php echo app('translator')->get('If you ban this user he/she won\'t able to access his/her dashboard.'); ?></h6>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Reason'); ?></label>
                                <textarea class="form-control" name="reason" rows="4" required></textarea>
                            </div>
                        <?php else: ?>
                            <p><span><?php echo app('translator')->get('Ban reason was'); ?>:</span></p>
                            <p><?php echo e($user->ban_reason); ?></p>
                            <h4 class="text-center mt-3"><?php echo app('translator')->get('Are you sure to unban this user?'); ?></h4>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <?php if($user->status == Status::USER_ACTIVE): ?>
                            <button type="submit" class="btn btn--primary h-45 w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        <?php else: ?>
                            <button type="button" class="btn btn--dark"
                                data-bs-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Yes'); ?></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict"

            let mobileElement = $('.mobile-code');
            $('select[name=country]').change(function() {
                mobileElement.text(`+${$('select[name=country] :selected').data('mobile_code')}`);
            });

            $('select[name=country]').val('<?php echo e(@$user->country_code); ?>');
            let dialCode = $('select[name=country] :selected').data('mobile_code');
            let mobileNumber = `<?php echo e($user->mobile); ?>`;
            mobileNumber = mobileNumber.replace(dialCode, '');
            $('input[name=mobile]').val(mobileNumber);
            mobileElement.text(`+${dialCode}`);

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/users/detail.blade.php ENDPATH**/ ?>