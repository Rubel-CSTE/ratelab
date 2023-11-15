<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="la la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar__main-logo"><img src="<?php echo e(getImage(getFilePath('logoIcon') .'/logo.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item <?php echo e(menuActive('admin.dashboard')); ?>">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link ">
                        <i class="menu-icon la la-home"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Dashboard'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.category.index')); ?>">
                    <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link"
                       data-default-url="<?php echo e(route('admin.category.index')); ?>">
                        <i class="menu-icon la la-stamp"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Categories'); ?> </span>
                    </a>
                </li>

                  <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.company*',3)); ?>">
                        <i class="menu-icon la la-bank"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Companies'); ?></span>

                        <?php if($pendingCompaniesCount > 0 ): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.company*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.company.index')); ?> ">
                                <a href="<?php echo e(route('admin.company.index')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Companies'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.company.approved')); ?> ">
                                <a href="<?php echo e(route('admin.company.approved')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Approved'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.company.pending')); ?> ">
                                <a href="<?php echo e(route('admin.company.pending')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending'); ?></span>
                                    <?php if($pendingCompaniesCount): ?>
                                        <span class="menu-badge pill bg--danger ms-auto"><?php echo e($pendingCompaniesCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.company.rejected')); ?> ">
                                <a href="<?php echo e(route('admin.company.rejected')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Rejected'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.review.index')); ?>">
                    <a href="<?php echo e(route('admin.review.index')); ?>" class="nav-link"
                       data-default-url="<?php echo e(route('admin.review.index')); ?>">
                        <i class="menu-icon la la-comments"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Reviews'); ?> </span>
                    </a>
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.advertisement.index')); ?>">
                    <a href="<?php echo e(route('admin.advertisement.index')); ?>" class="nav-link"
                       data-default-url="<?php echo e(route('admin.review.index')); ?>">
                        <i class="menu-icon la la-ad"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Advertisements'); ?> </span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.users*',3)); ?>">
                        <i class="menu-icon la la-users"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Users'); ?></span>

                        <?php if($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0 ): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="la la-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.users*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.active')); ?> ">
                                <a href="<?php echo e(route('admin.users.active')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Active Users'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.banned')); ?> ">
                                <a href="<?php echo e(route('admin.users.banned')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Banned Users'); ?></span>
                                    <?php if($bannedUsersCount): ?>
                                        <span class="menu-badge pill bg--danger ms-auto"><?php echo e($bannedUsersCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                            <li class="sidebar-menu-item  <?php echo e(menuActive('admin.users.email.unverified')); ?>">
                                <a href="<?php echo e(route('admin.users.email.unverified')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Email Unverified'); ?></span>

                                    <?php if($emailUnverifiedUsersCount): ?>
                                        <span class="menu-badge pill bg--danger ms-auto"><?php echo e($emailUnverifiedUsersCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.mobile.unverified')); ?>">
                                <a href="<?php echo e(route('admin.users.mobile.unverified')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Mobile Unverified'); ?></span>
                                    <?php if($mobileUnverifiedUsersCount): ?>
                                        <span
                                            class="menu-badge pill bg--danger ms-auto"><?php echo e($mobileUnverifiedUsersCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>

                        
                         

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.all')); ?> ">
                                <a href="<?php echo e(route('admin.users.all')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Users'); ?></span>
                                </a>
                            </li>


                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.notification.all')); ?>">
                                <a href="<?php echo e(route('admin.users.notification.all')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Notification to All'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.ticket*',3)); ?>">
                        <i class="menu-icon la la-ticket"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Support Ticket'); ?> </span>
                        <?php if(0 < $pendingTicketCount): ?>
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="la la-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.ticket*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.pending')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.pending')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending Ticket'); ?></span>
                                    <?php if($pendingTicketCount): ?>
                                    <span
                                    class="menu-badge pill bg--danger ms-auto"><?php echo e($pendingTicketCount); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.closed')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.closed')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Closed Ticket'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.answered')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.answered')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Answered Ticket'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.index')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.index')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Ticket'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.report*',3)); ?>">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Report'); ?> </span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.report*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive(['admin.report.login.history','admin.report.login.ipHistory'])); ?>">
                                <a href="<?php echo e(route('admin.report.login.history')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Login History'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.report.notification.history')); ?>">
                                <a href="<?php echo e(route('admin.report.notification.history')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Notification History'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


               


                <li class="sidebar__menu-header"><?php echo app('translator')->get('Settings'); ?></li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.index')); ?>">
                    <a href="<?php echo e(route('admin.setting.index')); ?>" class="nav-link">
                        <i class="menu-icon la la-life-ring"></i>
                        <span class="menu-title"><?php echo app('translator')->get('General Setting'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.system.configuration')); ?>">
                    <a href="<?php echo e(route('admin.setting.system.configuration')); ?>" class="nav-link">
                        <i class="menu-icon la la-cog"></i>
                        <span class="menu-title"><?php echo app('translator')->get('System Configuration'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.logo.icon')); ?>">
                    <a href="<?php echo e(route('admin.setting.logo.icon')); ?>" class="nav-link">
                        <i class="menu-icon la la-images"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Logo & Favicon'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.extensions.index')); ?>">
                    <a href="<?php echo e(route('admin.extensions.index')); ?>" class="nav-link">
                        <i class="menu-icon la la-cogs"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Extensions'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive(['admin.language.manage','admin.language.key'])); ?>">
                    <a href="<?php echo e(route('admin.language.manage')); ?>" class="nav-link"
                       data-default-url="<?php echo e(route('admin.language.manage')); ?>">
                        <i class="menu-icon la la-language"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Language'); ?> </span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.seo')); ?>">
                    <a href="<?php echo e(route('admin.seo')); ?>" class="nav-link">
                        <i class="menu-icon la la-globe"></i>
                        <span class="menu-title"><?php echo app('translator')->get('SEO Manager'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.setting.notification*',3)); ?>">
                        <i class="menu-icon la la-bell"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Notification Setting'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.setting.notification*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.global')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.global')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Global Template'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.email')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.email')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Email Setting'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.sms')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.sms')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('SMS Setting'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.notification.templates')); ?> ">
                                <a href="<?php echo e(route('admin.setting.notification.templates')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Notification Templates'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header"><?php echo app('translator')->get('Frontend Manager'); ?></li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.frontend.templates')); ?>">
                    <a href="<?php echo e(route('admin.frontend.templates')); ?>" class="nav-link ">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Templates'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.frontend.manage.*')); ?>">
                    <a href="<?php echo e(route('admin.frontend.manage.pages')); ?>" class="nav-link ">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Pages'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.frontend.sections*',3)); ?>">
                        <i class="menu-icon la la-puzzle-piece"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Section'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.frontend.sections*',2)); ?> ">
                        <ul>
                            <?php
                               $lastSegment =  collect(request()->segments())->last();
                            ?>
                            <?php $__currentLoopData = getPageSections(true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $secs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($secs['builder']): ?>
                                    <li class="sidebar-menu-item  <?php if($lastSegment == $k): ?> active <?php endif; ?> ">
                                        <a href="<?php echo e(route('admin.frontend.sections',$k)); ?>" class="nav-link">
                                            <i class="menu-icon la la-dot-circle"></i>
                                            <span class="menu-title"><?php echo e(__($secs['name'])); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header"><?php echo app('translator')->get('Extra'); ?></li>


                <li class="sidebar-menu-item <?php echo e(menuActive('admin.maintenance.mode')); ?>">
                    <a href="<?php echo e(route('admin.maintenance.mode')); ?>" class="nav-link">
                        <i class="menu-icon la la-robot"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Maintenance Mode'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.cookie')); ?>">
                    <a href="<?php echo e(route('admin.setting.cookie')); ?>" class="nav-link">
                        <i class="menu-icon la la-cookie-bite"></i>
                        <span class="menu-title"><?php echo app('translator')->get('GDPR Cookie'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.system*',3)); ?>">
                        <i class="menu-icon la la-server"></i>
                        <span class="menu-title"><?php echo app('translator')->get('System'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.system*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.system.info')); ?> ">
                                <a href="<?php echo e(route('admin.system.info')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Application'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.system.server.info')); ?> ">
                                <a href="<?php echo e(route('admin.system.server.info')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Server'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.system.optimize')); ?> ">
                                <a href="<?php echo e(route('admin.system.optimize')); ?>" class="nav-link">
                                    <i class="menu-icon la la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Cache'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.custom.css')); ?>">
                    <a href="<?php echo e(route('admin.setting.custom.css')); ?>" class="nav-link">
                        <i class="menu-icon lab la-css3-alt"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Custom CSS'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.request.report')); ?>">
                    <a href="<?php echo e(route('admin.request.report')); ?>" class="nav-link"
                       data-default-url="<?php echo e(route('admin.request.report')); ?>">
                        <i class="menu-icon la la-bug"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Report & Request'); ?> </span>
                    </a>
                </li>
            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary"><?php echo e(__(systemDetails()['name'])); ?></span>
                <span class="text--success"><?php echo app('translator')->get('V'); ?><?php echo e(systemDetails()['version']); ?> </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

<?php $__env->startPush('script'); ?>
    <script>
        if($('li').hasClass('active')){
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            },500);
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/partials/sidenav.blade.php ENDPATH**/ ?>