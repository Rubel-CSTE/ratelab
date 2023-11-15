<?php
$content = getContent('review.content', true);
$reviews = App\Models\Review::with('user', 'company')
         ->orderBy('id', 'DESC')
         ->limit(20)
         ->get();
?>
<section class="review-section pt-100 10b-50 section--bg2 overflow-hidden">
    <div class="shape-one"></div>
    <div class="shape-two"></div>
    <div class="shape-three"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-6">
                <div class="section-header text-center wow fadeInUp" data-wow-duration="0.5" data-wow-delay="0.3s">
                    <h3 class="section-title text-white border--style"><?php echo e(__(@$content->data_values->heading )); ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="review-slider">
            <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="single-slide">
                    <div class="review-card">
                        <div class="review-card__top">
                            <div class="thumb">
                                <img src="<?php echo e(getImage(getFilePath('userProfile').'/' . @$review->user->image, getFileSize('userProfile'), true)); ?>" alt="<?php echo app('translator')->get('Image'); ?>"/>
                            </div>
                            <div class="content">
                                <h6 class="fs--16px"><a href="<?php echo e(route('company.details', [$review->company->id, slug($review->company->name)])); ?>"><?php echo e(@$review->company->name); ?></a>
                                </h6>
                                <p class="fs--14px mt-1"><?php echo app('translator')->get('Reviewed by'); ?>
                                    <span   class="text--base"><strong><?php echo e(@$review->user->fullname); ?></strong></span>
                                </p>
                            </div>
                        </div>
                        <div class="review-card__ratings text--base">
                            <?php
                                echo rating($review->rating);
                            ?>
                        </div>
                        <p class="review-card__des"><?php echo e(__(strLimit($review->review))); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <span><?php echo app('translator')->get('No Review'); ?></span>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/sections/review.blade.php ENDPATH**/ ?>