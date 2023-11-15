<!-- navbar-wrapper start -->
<nav class="navbar-wrapper bg--dark">
    <div class="navbar__left">
        <button type="button" class="res-sidebar-open-btn me-3"><i class="las la-bars"></i></button>
        <form class="navbar-search">
            <input type="search" name="#0" class="navbar-search-field" id="searchInput" autocomplete="off"
                placeholder="<?php echo app('translator')->get('Search here...'); ?>">
            <i class="las la-search"></i>
            <ul class="search-list"></ul>
        </form>
    </div>
    <div class="navbar__right">
        <ul class="navbar__action-list">

            <li class="dropdown">
                <button type="button" class="primary--layer" data-bs-toggle="dropdown" data-display="static"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="las la-bell text--primary <?php if($adminNotificationCount > 0): ?> icon-left-right <?php endif; ?>"></i>
                </button>
                <div class="dropdown-menu dropdown-menu--md p-0 border-0 box--shadow1 dropdown-menu-right">
                    <div class="dropdown-menu__header">
                        <span class="caption"><?php echo app('translator')->get('Notification'); ?></span>
                        <?php if($adminNotificationCount > 0): ?>
                            <p><?php echo app('translator')->get('You have'); ?> <?php echo e($adminNotificationCount); ?> <?php echo app('translator')->get('unread notification'); ?></p>
                        <?php else: ?>
                            <p><?php echo app('translator')->get('No unread notification found'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="dropdown-menu__body">
                        <?php $__currentLoopData = $adminNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('admin.notification.read',$notification->id)); ?>"
                                class="dropdown-menu__item">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__left bg--green b-radius--rounded"><img
                                            src="<?php echo e(getImage(getFilePath('userProfile').'/'.@$notification->user->image,getFileSize('userProfile'))); ?>"
                                            alt="<?php echo app('translator')->get('Profile Image'); ?>"></div>
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title"><?php echo e(__($notification->title)); ?></h6>
                                        <span class="time"><i class="far fa-clock"></i>
                                            <?php echo e($notification->created_at->diffForHumans()); ?></span>
                                    </div>
                                </div><!-- navbar-notifi end -->
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="dropdown-menu__footer">
                        <a href="<?php echo e(route('admin.notifications')); ?>"
                            class="view-all-message"><?php echo app('translator')->get('View all notification'); ?></a>
                    </div>
                </div>
            </li>


            <li class="dropdown">
                <button type="button" class="" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="navbar-user">
                        <span class="navbar-user__thumb"><img
                                src="<?php echo e(getImage('assets/admin/images/profile/'. auth()->guard('admin')->user()->image)); ?>"
                                alt="image"></span>
                        <span class="navbar-user__info">
                            <span
                                class="navbar-user__name"><?php echo e(auth()->guard('admin')->user()->username); ?></span>
                        </span>
                        <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a href="<?php echo e(route('admin.profile')); ?>"
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-user-circle"></i>
                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('Profile'); ?></span>
                    </a>

                    <a href="<?php echo e(route('admin.password')); ?>"
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-key"></i>
                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('Password'); ?></span>
                    </a>

                    <a href="<?php echo e(route('admin.logout')); ?>"
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('Logout'); ?></span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar-wrapper end -->
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/partials/topnav.blade.php ENDPATH**/ ?>