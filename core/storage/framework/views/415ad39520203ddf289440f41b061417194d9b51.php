<?php
$content = getContent('choose_reason.content', true);
$elements = getContent('choose_reason.element', false, null, true);
?>
<section class="pt-100 pb-100 glass--overlay overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-6">
                <div class="section-header text-center wow fadeInLeft" data-wow-duration="0.5" data-wow-delay="0.3s">
                    <div class="section-subtitle border-left-right text--base"><?php echo e(__(@$content->data_values->subheading)); ?></div>
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                </div>
            </div>
        </div>
        <div class="row g-5 justify-content-center">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choose_reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 choose-item wow fadeInLeft" data-wow-duration="0.5" data-wow-delay="0.3s">
                    <div class="choose-card">
                        <div class="cta-card__icon">
                            <?php
                                echo @$choose_reason->data_values->icon;
                            ?>
                        </div>
                        <div class="choose-card__content">
                            <h3 class="choose-card__title"><?php echo e(__(@$choose_reason->data_values->title)); ?></h3>
                            <p class="choose-card__description mt-3"> <?php echo e(__(@$choose_reason->data_values->description)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH D:\wamp64\www\fxbrokeview\core\resources\views/templates/basic/sections/choose_reason.blade.php ENDPATH**/ ?>