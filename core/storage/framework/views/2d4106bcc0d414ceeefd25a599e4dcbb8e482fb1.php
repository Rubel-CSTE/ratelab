<div class="d-none countResult">
    <?php echo e($companies->total()); ?> <?php echo app('translator')->get(' items found'); ?>
</div>

<?php
    $adShowAfterColum = 4;
?>

<?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="col-lg-6">
        <div class="company-review has--link">
            <a href="<?php echo e(route('company.details', [$company->id, slug($company->name)])); ?>" class="item--link"></a>
            <div class="company-review__top">
                <div class="thumb">
                   
                    
                <img src="<?php echo e(getImage(getFilePath('company').'/'.@$company->image, getFileSize('company'))); ?>" alt="<?php echo app('translator')->get('logo'); ?>" />

                    <?php if($company->user_id == auth()->id()): ?>
                    <span class="auth-company">
                        <i class="la la-user" aria-hidden="true"></i>
                    </span>
                    <?php endif; ?>
                </div>
                <div class="content">
                    <div class="company-review__name d-flex flex-wrap justify-content-between">
                        <div class="left-side">
                            <h6>
                                <a href="<?php echo e(route('company.details', [$company->id, slug($company->name)])); ?>"><?php echo e(@$company->name); ?></a>
                            </h6>
                            <p class="cate-name fs--14px"><i class="las la-certificate"></i> <?php echo e(__($company->category->name)); ?></p>
                        </div>
                        <div class="text-right text--base">
                            <?php echo avgRating($company->avg_rating); ?>
                            <p class="fs--14px text-muted"> &nbsp; <?php echo e($company->avg_rating); ?>

                                (<?php echo e(@$company->reviews_count); ?>

                                <?php echo app('translator')->get('ratings'); ?>)
                            </p>
                        </div>
                    </div>
                </div>
                <span class="fs--14px mt-2 lh-1"><i class="las la-map-marker"></i> <?php echo e(@$company->address); ?></span>
            </div>
            <div class="company-review__ratings mt-3 text--base">
                <div class="d-flex justify-content-between">
                    <span class="fs--14px text-muted d-block"><?php echo app('translator')->get('Registered On'); ?> : <?php echo e(showDateTime($company->created_at, 'd M Y')); ?></span>
                </div>
            </div>
            <div class="company-review__tags mt-2">

                <?php $__currentLoopData = @$company->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($tag); ?>

                    <?php echo e(!$loop->last ? ', ' : null); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php if($k + 1 == $adShowAfterColum): ?>
        <?php
            $adShowAfterColum += 4;
            echo getAdvertisement('728x90');
        ?>
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="review-block">
        <div class="customer-reviewdd">
            <div class="d-flex justify-content-center">
                <h5> <?php echo e(__($emptyMessage)); ?></h5>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="mt-3">
    <ul class="pagination justify-content-end">
        <?php if($companies->hasPages()): ?>
            <?php echo e(paginateLinks($companies)); ?>

        <?php endif; ?>
    </ul>
</div>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/company/companies.blade.php ENDPATH**/ ?>