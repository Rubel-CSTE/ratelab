<?php $__env->startSection('content'); ?>
    <?php
        $regContent = getContent('register.content', true);
        $policyPages = getContent('policy_pages.element', false, null, true);
    ?>
    <section class="account-section style--two">
        <div class="left bg_img"
            style="background-image: url('<?php echo e(getImage('assets/images/frontend/register/' . @$regContent->data_values->image, '1920x1280')); ?>');">
            <div class="left-inner text-center">
                <h6 class="text--base"><?php echo app('translator')->get('Welcome to '); ?> <?php echo e(__($general->site_name)); ?></h6>
                <h2 class="title text-white"><?php echo e(__(@$regContent->data_values->heading)); ?></h2>
                <p class="mt-3"><?php echo app('translator')->get('Have an account?'); ?> <a href="<?php echo e(route('user.login')); ?>"
                        class="text--base"><?php echo app('translator')->get('Login Now'); ?></a></p>
            </div>
        </div>

        <div class="right">
            <div class="top w-100 text-center">
                <a class="account-logo" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>">
                </a>
            </div>

            <div class="middle w-100">
                <form action="<?php echo e(route('user.register')); ?>" method="POST" class="account-form verify-gcaptcha">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('First Name'); ?></label>
                                <input type="text" class="form-control form--control" name="firstname"
                                    value="<?php echo e(old('firstname')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Last Name'); ?></label>
                                <input type="text" class="form-control form--control" name="lastname"
                                    value="<?php echo e(old('lastname')); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Username'); ?></label>
                                <input type="text" class="form-control form--control checkUser" name="username"
                                    value="<?php echo e(old('username')); ?>" required>
                                <small class="text-danger usernameExist"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('E-Mail Address'); ?></label>
                                <input type="email" class="form-control form--control checkUser" name="email"
                                    value="<?php echo e(old('email')); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Country'); ?></label>
                                <select name="country" class="form-control form--control select-country">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-mobile_code="<?php echo e($country->dial_code); ?>"
                                            value="<?php echo e($country->country); ?>" data-code="<?php echo e($key); ?>">
                                            <?php echo e(__($country->country)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Mobile'); ?></label>
                                <div class="input-group ">
                                    <span class="input-group-text bg--base text-white border-0 mobile-code">

                                    </span>
                                    <input type="hidden" name="mobile_code">
                                    <input type="hidden" name="country_code">
                                    <input type="number" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                        class="form-control form--control checkUser" required>
                                </div>
                                <small class="text-danger mobileExist"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                <input type="password" class="form-control form--control" name="password" required>
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
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                <input type="password" class="form-control form--control" name="password_confirmation"
                                    required>
                            </div>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>

                    </div>

                    <?php if($general->agree): ?>
                        <div class="form-group">
                            <input type="checkbox" id="agree" <?php if(old('agree')): echo 'checked'; endif; ?> name="agree" required>
                            <label for="agree"><?php echo app('translator')->get('I agree with'); ?> <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a
                                        href="<?php echo e(route('policy.pages', [slug($policy->data_values->title), $policy->id])); ?>"><?php echo e(__($policy->data_values->title)); ?></a>
                                    <?php if(!$loop->last): ?>
                                        ,
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </label>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <button type="submit" id="recaptcha" class="btn btn--base w-100"> <?php echo app('translator')->get('Register'); ?></button>
                    </div>
                    <p class="mb-0"><?php echo app('translator')->get('Already have an account?'); ?> <a href="<?php echo e(route('user.login')); ?>"><?php echo app('translator')->get('Login'); ?></a></p>
                </form>
            </div>
            <div class="bottom w-100 text-center">
                <p class="mb-0 sm-text text-center">
                    <?php echo $__env->make($activeTemplate . 'partials.copyright_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </p>
            </div>
        </div>
    </section>

    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle"><?php echo app('translator')->get('You are with us'); ?></h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center"><?php echo app('translator')->get('You already have an account please Login '); ?></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm"
                        data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <a href="<?php echo e(route('user.login')); ?>" class="btn btn--base btn-sm"><?php echo app('translator')->get('Login'); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }

        label {
            color: #f8f9fa !important;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php if($general->secure_password): ?>
    <?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($) {
            <?php if($mobileCode): ?>
                $(`option[data-code=<?php echo e($mobileCode); ?>]`).attr('selected', '');
            <?php endif; ?>

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            <?php if($general->secure_password): ?>
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });
            <?php endif; ?>

            $('.checkUser').on('focusout', function(e) {
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/user/auth/register.blade.php ENDPATH**/ ?>