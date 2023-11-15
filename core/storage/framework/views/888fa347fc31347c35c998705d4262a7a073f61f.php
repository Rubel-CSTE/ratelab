<?php
    $content = getContent('contact_us.content', true);
    $element = getContent('contact_us.element', false, null, true);
    $iconElement = getContent('social_icon.element', false, null, true);
?>
<?php $__env->startSection('content'); ?>
    <section class="pt-100 pb-100 contact-section overflow-hidden">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-wrapper d-flex flex-wrap">
                        <div class="contact-wrapper__left">
                            <form class="contact-form verify-gcaptcha" method="post" action="">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label><?php echo app('translator')->get('Full Name'); ?></label>
                                        <div class="custom-icon-field">
                                            <i class="las la-user"></i>
                                            <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                                                autocomplete="off" class="form--control" placeholder="<?php echo app('translator')->get('Full name'); ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label><?php echo app('translator')->get('Email Address'); ?></label>
                                        <div class="custom-icon-field">
                                            <i class="las la-envelope"></i>
                                            <input type="text" name="email" value="<?php echo e(old('email')); ?>"
                                                autocomplete="off" class="form--control" placeholder="<?php echo app('translator')->get('Email address'); ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <label><?php echo app('translator')->get('Subject'); ?></label>
                                        <div class="custom-icon-field">
                                            <i class="las la-notes-medical"></i>
                                            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>"
                                                autocomplete="off" class="form--control" placeholder="<?php echo app('translator')->get('Subject Line'); ?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 form-group">
                                        <label><?php echo app('translator')->get('Message'); ?></label>
                                        <div class="custom-icon-field">
                                            <i class="las la-comment-alt"></i>
                                            <textarea name="message" autocomplete="off" class="form--control" wrap="off" placeholder="<?php echo app('translator')->get('Write message'); ?>"
                                                required><?php echo e(old('message')); ?></textarea>
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

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn--base w-100">
                                            <?php echo app('translator')->get('Submit'); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="contact-wrapper__right">
                            <div class="contact-wrapper__shape-one"></div>
                            <div class="contact-wrapper__shape-two"></div>
                            <div class="top-part">
                                <h3 class="title text-white"><?php echo e(__(@$content->data_values->title)); ?></h3>
                                <ul class="contact-info-list mt-5">
                                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="icon"> <?php echo @$item->data_values->icon ?></i></div>
                                            <div class="content">
                                                <p> <?php echo e(@$item->data_values->content); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <ul class="social-links d-flex flex-wrap align-items-center">
                                <?php $__currentLoopData = $iconElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(@$icon->data_values->url); ?>">
                                            <?php echo @$icon->data_values->social_icon; ?>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div><!-- contact-wrapper end -->
                </div>
            </div>
        </div>

        <div class="pt-100">
            <?php if($sections->secs != null): ?>
                <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make($activeTemplate . 'sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/contact.blade.php ENDPATH**/ ?>