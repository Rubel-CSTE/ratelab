<?php $__env->startSection('content'); ?>
    <section class="pt-100 pb-100 contact-section overflow-hidden">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>
        <div class="container">
            <div class="row gy-5 gy-lg-0">
                <div class="col-lg-12">
                    <div class="row gy-4 justify-content-center">
                        <div class="custom-card">
                            <p>
                                <?php echo $policy->data_values->details ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/policy.blade.php ENDPATH**/ ?>