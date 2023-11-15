<?php
    $loginContent = getContent('login.content', true);
?>
<?php $__env->startSection('content'); ?>

    <style>
        /* Style for the buttons using the main color */
        .btn-google {
            background-color: #dd4b39;
            color: #fff;
            border: none;
        }

        .btn-facebook {
            background-color: #3b5998; /* Facebook blue color */
            color: #fff;
            border: none;
        }
    </style>
    
    <section class="account-section">
        <div class="left bg_img"
            style="background-image: url('<?php echo e(getImage('assets/images/frontend/login/' . @$loginContent->data_values->image, '1920x1080')); ?>');">
            <div class="left-inner text-center">
                <h6 class="text--base"><?php echo e(__(@$loginContent->data_values->greeting)); ?> <?php echo e(__($general->site_name)); ?></h6>
                <h2 class="title text-white"><?php echo e(__(@$loginContent->data_values->heading)); ?></h2>
                <p class="mt-3"><?php echo app('translator')->get("Don't have an account?"); ?> <a href="<?php echo e(route('user.register')); ?>"
                        class="text--base"><?php echo app('translator')->get('Create Now'); ?></a></p>
            </div>
        </div>

        <div class="right">
            <div class="top w-100 text-center">
                <a class="account-logo" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>">
                </a>
            </div>
            <div class="middle w-100 mt-5">
                
                <!-- Google Register Button -->
                <a href="<?php echo e(url('login/google')); ?>" class="btn w-100 btn-block btn-google mb-3">
                    <i class="fab fa-google"></i> Register with Google
                </a>
    
                <!-- Facebook Register Button -->
                <a href="<?php echo e(url('login/facebook')); ?>" class="btn w-100 btn-block btn-facebook mb-3">
                    <i class="fab fa-facebook-f"></i> Register with Facebook
                </a>
        
                <form class="account-form verify-gcaptcha" method="POST" action="<?php echo e(route('user.login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label><?php echo app('translator')->get('Username or Email'); ?></label>
                        <input type="text" name="username" autocomplete="off" class="form--control"
                            placeholder="<?php echo app('translator')->get('Username or Email'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label><?php echo app('translator')->get('Password'); ?></label>
                        <div class="input-group">
                            <input type="password" name="password" autocomplete="off" class="form--control"
                                placeholder="<?php echo app('translator')->get('Password'); ?>" required>
                            <button type="button" class="input-group-text border-0 bg--base text-white toggle-password">
                                <i class="la la-eye"></i>
                            </button>
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

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="remember">
                            <?php echo app('translator')->get('Remember Me'); ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="recaptcha" class="btn btn--base w-100"><?php echo app('translator')->get('Login'); ?></button>
                    </div>
                    <div class="form-group">
                        <a class=" btn-link text-decoration-none text--base" href="<?php echo e(route('user.password.request')); ?>">
                            <?php echo app('translator')->get('Forgot Password?'); ?>
                        </a>
                    </div>
                </form>
            </div>
            <div class="bottom w-100 text-center">
                <p class="mb-0 sm-text text-center">
                    <?php echo $__env->make($activeTemplate . 'partials.copyright_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </p>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        //ShowHide-password//
        $(".toggle-password").on('click', function() {
            $(this).find('i').toggleClass("las la-eye-slash");
            var input = $(this).siblings('input');
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\fxbrokeview\core\resources\views/templates/basic/user/auth/login.blade.php ENDPATH**/ ?>