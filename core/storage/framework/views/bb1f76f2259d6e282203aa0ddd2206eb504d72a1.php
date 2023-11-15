<?php
    $addShowAfterColum = 3;
?>

<?php if($myReview && (request()->page == 1 || request()->page == null)): ?>
    <div class="customer-review mb-3">
        <div class="customer-review__thumb">
            <img src="<?php echo e(getImage(getFilePath('userProfile') . '/' . @$myReview->user->image, getFileSize('userProfile'))); ?>"
                alt="image" />
        </div>
        <div class="customer-review__content">
            <div class="customer-review__header">
                <div class="left">
                    <h6><?php echo e(__(@$myReview->user->fullname)); ?></h6>
                    <span><i class="la la-map-marker-alt"></i><?php echo e(__(@$myReview->user->address->country)); ?></span>
                </div>
                <div class="right">
                    <div class="ratings d-flex align-items-center justify-content-end">
                        <?php
                            echo rating(@$myReview->rating);
                        ?>
                    </div>
                </div>
            </div>
            <div class="customer-review__body">
                <p> <?php echo e(__(@$myReview->review)); ?></p>
            </div>

            <?php if(auth()->id() == $myReview->user_id): ?>
                <div class="customer-review__footer">
                    <div class="left">
                        <ul class="customer-review__action-list">
                            <li>
                                <button class="edit-review" type="button" data-bs-toggle="modal"
                                    data-bs-target="#reviewUpdateModal" data-id="<?php echo e($myReview->id); ?>"
                                    data-review="<?php echo e($myReview->review); ?>" data-rating="<?php echo e($myReview->rating); ?>"><i
                                        class="la la-edit text--base"></i>
                                    <?php echo app('translator')->get('Edit Review'); ?>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <ul class="customer-review__action-list">
                            <li>
                                <button class="delete-review" type="button" data-bs-toggle="modal"
                                    data-bs-target="#reviewDeleteModal" data-id="<?php echo e($myReview->id); ?>"><i
                                        class="la la-trash-alt text--danger"></i><?php echo app('translator')->get('Delete'); ?></button>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>

<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="customer-review mb-3">
        <div class="customer-review__thumb">
            <img src="<?php echo e(getImage(getFilePath('userProfile') . '/' . @$review->user->image, getFileSize('userProfile'))); ?>"
                alt="image" />
        </div>
        <div class="customer-review__content">
            <div class="customer-review__header">
                <div class="left">
                    <h6><?php echo e(__(@$review->user->fullname)); ?></h6>
                    <span><i class="la la-map-marker-alt"></i><?php echo e(__(@$review->user->address->country)); ?></span>
                </div>
                <div class="right">
                    <div class="ratings d-flex align-items-center justify-content-end">
                        <?php
                            echo rating(@$review->rating);
                        ?>
                    </div>
                </div>
            </div>
            <div class="customer-review__body">
                <p> <?php echo e(__(@$review->review)); ?></p>
            </div>
        </div>
    </div>

    <?php if($loop->index + 1 == $addShowAfterColum): ?>
        <?php
            $addShowAfterColum += 3;
        ?>
        <div class="my-3">
            <?php
                echo getAdvertisement('728x90');
            ?>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div>
    <ul class="pagination justify-content-end me-3">
        <?php if($reviews->hasPages()): ?>
            <?php echo e(paginateLinks($reviews)); ?>

        <?php endif; ?>
    </ul>
</div>
<?php if(empty($myReview) === true && count($reviews) === 0): ?>
<div class="review-block">
    <div class="customer-review d-flex justify-content-center">
        <h5><?php echo app('translator')->get('No review yet!'); ?></h5>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/partials/company_review.blade.php ENDPATH**/ ?>