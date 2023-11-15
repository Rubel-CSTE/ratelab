<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(getImage(getFilePath('logoIcon') .'/logo.png')); ?>"  alt="<?php echo e(__($general->site_name)); ?>">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ms-auto">
                        <li class="<?php echo e(menuActive('home')); ?>"><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                        <li class="<?php echo e(menuActive('company.*')); ?>"><a
                                href="<?php echo e(route('company.all')); ?>"><?php echo app('translator')->get('Companies'); ?></a></li>
                        <li class="<?php echo e(menuActive('blog')); ?>"><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('Blog'); ?></a></li>
                        <?php if(@$pages): ?>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a class="<?php echo e(menuActive('pages', [$data->slug])); ?>" href="<?php echo e(route('pages', [$data->slug])); ?>"><?php echo e(__($data->name)); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="<?php echo e(menuActive('contact')); ?>">
                                <a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('Contact'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li class="menu_has_children <?php echo e(menuActive('user.company.*')); ?> ">
                                <a href="javascript:void(0)"><?php echo app('translator')->get('My Company'); ?></a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo e(route('user.company.index')); ?>"><?php echo app('translator')->get('Company List'); ?></a></li>
                                    <li><a href="<?php echo e(route('user.company.create')); ?>"><?php echo app('translator')->get('Add Company'); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu_has_children">
                                <a href="javascript:void(0)"> <?php echo e(auth()->user()->username); ?></a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo e(route('user.profile.setting')); ?>"><?php echo app('translator')->get('My Profile'); ?></a></li>
                                    <li><a href="<?php echo e(route('user.change.password')); ?>"><?php echo app('translator')->get('Change Password'); ?></a></li>
                                    <li><a href="<?php echo e(route('ticket.index')); ?>"><?php echo app('translator')->get('My Support Tickets'); ?></a></li>
                                    <li><a href="<?php echo e(route('ticket.open')); ?>"><?php echo app('translator')->get('Open New Ticket'); ?></a></li>
                                    <li><a href="<?php echo e(route('user.logout')); ?>"><?php echo app('translator')->get('Logout'); ?></a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="nav-right btn--group">
                        <?php if($general->language): ?>
                        <select class="langSel d-flex align-items-center mx-2">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->code); ?>" <?php if(session('lang') == $item->code): ?> selected <?php endif; ?>>
                                <?php echo e(__($item->name)); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>
                        
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('user.login')); ?>"
                                class="btn btn-md btn--base d-flex align-items-center mx-2">
                                <i class="la la-sign-in-alt fs--18px me-2"></i> <?php echo app('translator')->get('Login'); ?>
                            </a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('user.home')); ?>"
                                class="btn btn-md btn--base d-flex align-items-center mx-2 mb-sm-2">
                                <i class="la la-user fs--18px me-2"></i> <?php echo app('translator')->get('Dashboard'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/partials/header.blade.php ENDPATH**/ ?>