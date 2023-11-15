<?php
$content = getContent('testimonial.content', true);
$element = getContent('testimonial.element', false, null, true);
?>
<section class="pt-100 pb-100 overflow-hidden bg_img"
    style="background-image: url('<?php echo e(getImage('assets/images/frontend/testimonial/' . @$content->data_values->image, '1920x840')); ?>');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-6">
                <div class="section-header text-center wow fadeInUp" data-wow-duration="0.5" data-wow-delay="0.3s">
                    <div class="section-subtitle border-left-right text--base">
                        <?php echo e(__(@$content->data_values->subheading)); ?></div>
                    <h2 class="section-title text-white"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="testimonial-slider">
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-slide">
                            <div class="testimonial-card">
                                <div class="testimonial-card__thumb">
                                    <img src="<?php echo e(getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '100x100')); ?>"
                                        alt="<?php echo e(__(@$item->data_values->name)); ?>">
                                </div>
                                <h6 class="testimonial-card__name text-white"><?php echo e(__(@$item->data_values->name)); ?></h6>
                                <span class="testimonial-card__location"><?php echo e(__(@$item->data_values->address)); ?></span>
                                <p class="testimonial-card__text"><?php echo e(__(@$item->data_values->quote)); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\wamp64\www\fxbrokeview\core\resources\views/templates/basic/sections/testimonial.blade.php ENDPATH**/ ?>