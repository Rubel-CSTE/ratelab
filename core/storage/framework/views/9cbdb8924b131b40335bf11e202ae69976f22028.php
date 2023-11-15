<?php
$content = getContent('breadcrumb.content', true);
?>
<?php $__env->startSection('content'); ?>
    <section class="section--bg pb-100">
        <div class="company-details-bg bg_img d-lg-block d-none" style="background-image: url('<?php echo e(getImage('assets/images/frontend/breadcrumb/' . @$content->data_values->image, '1920x840')); ?>');">
        </div>
        <div class="company-details-header">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 ps-xxl-5">
                        <div class="row gy-4">
                            <div class="col-md-8 text-md-start text-center">
                                <div class="company-profile">
                                    <h3 class="company-profile__name"><?php echo e($company->name); ?></h3>
                                    <span><i class="las la-map-marker-alt"></i><?php echo e($company->address); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="company-website section--bg2 text-center has--link">
                                    <a target="__blank" href="<?php echo e($company->url); ?>" class="item--link"></a>
                                    <h6 class="fs--16px text-white"><i
                                            class="las la-external-link-alt"></i><?php echo e($company->url); ?></h6>
                                    <span class="fs--12px text-white"><?php echo app('translator')->get('Visit this site'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="company-sidebar">
                        <div class="row gy-5">
                            <div class="company-sidebar__widget col-lg-12 col-md-5">
                                <div class="company-overview">
                                    <div class="company-overview__thumb">
                                        <img src="<?php echo e(getImage(getFilePath('company').'/'. $company->image)); ?>"
                                            alt="image">
                                    </div>
                                </div>
                            </div><!-- company-sidebar__widget end -->
                            <div class="company-sidebar__widget col-lg-12 col-md-7">
                                <div class="rating-area d-flex flex-wrap align-items-center justify-content-between mb-4">
                                    <div class="rating"><?php echo e(showAmount(@$company->avg_rating)); ?></div>
                                    <div class="content">
                                        <div class="ratings d-flex align-items-center justify-content-end fs--18px">
                                            <?php
                                                echo avgRating($company->avg_rating);
                                            ?>
                                        </div>
                                        <span class="mt-1 text-muted fs--14px"><?php echo app('translator')->get('Based on'); ?>
                                            <?php echo e(@$company->reviews_count); ?> <?php echo app('translator')->get('Reviews'); ?></span>
                                    </div>
                                </div>

                                <?php for($i = 5; $i >= 1; $i--): ?>
                                    <?php
                                        $reviewCount = $company->reviews->where('rating', $i)->count();
                                        $percentage = 0;
                                        if ($reviewCount) {
                                            $percentage = ($reviewCount / $company->reviews_count) * 100;
                                        }
                                    ?>

                                    <div class="single-review">
                                        <p class="star"><?php echo e($i); ?> <i class="las la-star text--base"></i></p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: <?php echo e($percentage); ?>%" aria-valuenow="<?php echo e($percentage); ?>"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="percentage"><?php echo e(showAmount($percentage)); ?>%</span>
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <div class="company-sidebar__widget col-lg-12">
                                <div class="single-company-info">
                                    <h5 class="single-company-info__title"><?php echo app('translator')->get('About'); ?> <?php echo e(__($company->name)); ?></h5>
                                    <p class="mt-2"> <?php echo e(__(@$company->description)); ?> </p>
                                </div>
                                <div class="single-company-info">
                                    <h5 class="single-company-info__title"><?php echo app('translator')->get('Tags'); ?></h5>
                                    <div class=" mt-3">
                                        <?php $__currentLoopData = @$company->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($tag); ?>

                                            <?php if(!$loop->last): ?>,<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="single-company-info">
                                    <h5 class="single-company-info__title"><?php echo app('translator')->get('Contact Info'); ?></h5>
                                    <ul class="single-company-info__list">
                                        <li>
                                            <div class="icon"><i class="las la-link"></i></div>
                                            <div class="content">
                                                <a href="<?php echo e(@$company->url); ?>"><?php echo e(@$company->url); ?></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="las la-map-marker-alt"></i></div>
                                            <div class="content">
                                                 <p><?php echo e(__(@$company->address)); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="las la-envelope"></i></div>
                                            <div class="content">
                                                <a href="mailto:<?php echo e(@$company->email); ?>"><?php echo e(@$company->email); ?></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            
                            <!--Advertisement-->
                            <div class="has--link mt-4">
                                <?php
                                    echo getAdvertisement('300x250');
                                ?>
                            </div>

                        </div><!-- row end -->
                    </div>
                </div>
                <div class="col-lg-8 ps-xxl-5 mt-5">
                  
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(!$myReview): ?>
                        <div class="give-rating-area mb-5">
                            <form action="<?php echo e(route('company.user.review', $company->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="give-rating-person">
                                    <div class="thumb">
                                        <img src="<?php echo e(getImage(getFilePath('userProfile') .'/'. auth()->user()->image, getFileSize('userProfile'))); ?>" />
                                    </div>
                                    <div class="content">
                                        <h6><?php echo e(auth()->user()->fullname); ?></h6>
                                    </div>
                                    <div class='give-rating'>
                                        <?php for($i = 5; $i >= 1; $i--): ?>
                                            <span>
                                                <input id='str<?php echo e($i); ?>' name='rating' type='radio'
                                                    value='<?php echo e($i); ?>'>
                                                <label for='str<?php echo e($i); ?>'><i class="la la-star fa-sm"></i></label>
                                            </span>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <textarea name="review" class="form--control" placeholder="<?php echo app('translator')->get('Write review'); ?>" required><?php echo e(old('review')); ?></textarea>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn--base submitBtn" disabled><?php echo app('translator')->get('Submit'); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="give-rating-area mb-5">
                            <p class="text-center"><?php echo app('translator')->get('You need to'); ?>
                                <a href="<?php echo e(route('user.login')); ?>"  class="text--base"><?php echo app('translator')->get('Login'); ?></a> <?php echo app('translator')->get(' first to submit your review.'); ?>
                            </p>
                        </div>

                    <?php endif; ?>
                    <div class="customer-review-wrapper">
                        <?php echo $__env->make($activeTemplate . 'partials.company_review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- update review modal -->
        <div class="modal fade" id="reviewUpdateModal" tabindex="-1" aria-labelledby="reviewUpdateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewUpdateModalLabel"><?php echo app('translator')->get('Update Review'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('user.review.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row align-items-center mb-3">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <div class="t-company-content">
                                            <h6 class="view-company"></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class=' give-rating-update text--base'>
                                        <?php for($i = 5; $i >= 1; $i--): ?>
                                            <span id="existed-rating-<?php echo e($i); ?>">
                                                <input id='star<?php echo e($i); ?>' name='rating' type='radio' value='<?php echo e($i); ?>'>
                                                <label for='star<?php echo e($i); ?>'> <i class="las la-star fa-sm"></i></label>
                                            </span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="edit-id" value="" name="id">
                            <textarea name="review" class="form--control edit-review"></textarea>
                            <div class="text-end">
                                <button type="submit" class="btn btn--base"><?php echo app('translator')->get('Update'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- review delete modal -->
        <div class="modal fade" id="reviewDeleteModal" tabindex="-1" aria-labelledby="reviewDeleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewDeleteModalLabel"><?php echo app('translator')->get('Confirmation Alert'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to delete this review?'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo e(route('user.review.delete')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="" class="delete-id">
                            <button type="button" class="btn btn-sm btn--dark" data-bs-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                            <button type="submit" class="btn btn-sm btn--base"><?php echo app('translator')->get('Yes'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $(document).ready(function() {

           let x  = $('[name=rating]').on('click', function(){
               $('.submitBtn').removeAttr('disabled');
           });
            //

            //update review
                let result = $('.edit-review').data();
                $('.edit-id').val(result.id);
                $('#reviewUpdateModal').find('.edit-review').val(result.review);

                var existRating = result.rating;

                if (existRating == 5) {
                    $('#existed-rating-5').addClass('checked');
                } else if (existRating == 4) {
                    $('#existed-rating-4').addClass('checked');
                } else if (existRating == 3) {
                    $('#existed-rating-3').addClass('checked');
                } else if (existRating == 2) {
                    $('#existed-rating-2').addClass('checked');
                } else {
                    $('#existed-rating-1').addClass('checked');
                }
            

            //delete review
            $('.delete-review').on('click', function() {
                $('.delete-id').val($(this).data('id'));
            });

            //prime review Radio-box
            $(".give-rating input:radio").attr("checked", false);

            $(".give-rating input").click(function(e) {
                $(this).parent().siblings().removeClass("checked");
                $(this).parent().addClass("checked");
            });

            //update review Radio-box
            $(".give-rating-update input:radio").attr("checked", false);

            $(".give-rating-update input").click(function(e) {
                $(this).parent().siblings().removeClass("checked");
                $(this).parent().addClass("checked");
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/company/details.blade.php ENDPATH**/ ?>