
    <div class="profile-sidebar">
        <div class="profile-widget">
            <div class="thumb">
                <img src="<?php echo e(getImage(getFilePath('userProfile') .'/'. auth()->user()->image, getFileSize('userProfile'))); ?>" />
            </div>
            <h4 class="profile-name text-center mt-4"> <?php echo e(__(@ucwords(auth()->user()->fullname))); ?> </h4>
            <p class="text-center"><i class="la la-map-marker-alt"></i>
                <?php if(auth()->user()->address->city): ?>
                <?php echo e(__(@ucwords(auth()->user()->address->city))); ?>,
                <?php endif; ?>
                <?php echo e(__(@ucwords(auth()->user()->address->country))); ?>

            </p>
            <?php if(auth()->user()->about): ?>
            <hr>
            <p> <?php echo e(__(auth()->user()->about)); ?> </p>
            <?php endif; ?>
        </div><!-- profile-widget end -->

        <div class="profile-widget mt-5">
            <h5 class="profile-widget__title"><?php echo app('translator')->get('Profile Overview'); ?></h5>
            <ul class="profile-info-list">
                <li><i class="la la-user"></i> <?php echo app('translator')->get('Member since '); ?><?php echo e(showDateTime(auth()->user()->created_at, 'Y')); ?> </li>
                <li><i class="la la-envelope"></i> <?php echo e(auth()->user()->email); ?></li>
                <li><i class="la la-star"></i> <?php echo app('translator')->get('Total Reviews '); ?>
                    <span class="text--base"> &nbsp; <?php echo e($totalReview); ?></span>
                </li>
            </ul>
        </div>
        
        <div class="has--link item--link mt-4">
            <?php
                echo getAdvertisement('300x600');
            ?>
        </div>
    </div>

<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/partials/user_left_nav.blade.php ENDPATH**/ ?>