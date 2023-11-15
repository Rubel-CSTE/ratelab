<?php
$footerContent = getContent('footer.content', true);
$iconElement = getContent('social_icon.element', false, null, true);
$policyPages = getContent('policy_pages.element');
?>
<footer class="footer">
    <div class="shape-one"></div>
    <div class="shape-two"></div>
    <div class="footer__top">
        <div class="container">
            <div class="row gy-sm-4 gy-5 justify-content-between">
                <div class="col-lg-4 col-md-12 col-sm-6">
                    <div class="footer-widget">
                        <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(getImage(getFilePath('logoIcon') .'/logo.png', '100X100')); ?>" alt="<?php echo e(__($general->site_name)); ?>">
                        </a>
                        <p class="mt-lg-5"><?php echo e(__(strLimit($footerContent->data_values->description, 160))); ?></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title"><?php echo app('translator')->get("Quick Menu"); ?></h3>
                        <ul class="footer-menu">
                            <?php if(@$pages): ?>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('pages', [$data->slug])); ?>"><?php echo e(__($data->name)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get("Support"); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title"><?php echo app('translator')->get("Important Link"); ?></h3>
                        <ul class="footer-menu">
                            <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a class="t-link t-link--danger text--white"
                                        href="<?php echo e(route('policy.pages', [slug($page->data_values->title), $page->id])); ?>"><?php echo e(@$page->data_values->title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title"><?php echo app('translator')->get("Site Links"); ?></h3>
                        <ul class="footer-menu">
                            <li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get("Home"); ?></a></li>
                            <li><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get("Blog"); ?></a></li>
                            <li><a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get("Contact"); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-md-6 text-md-start text-center">
                    <p class="mb-0 sm-text">
                        <?php echo $__env->make($activeTemplate.'partials.copyright_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <ul
                        class="social-link d-flex flex-wrap align-items-center justify-content-md-end justify-content-center">
                        <?php $__currentLoopData = $iconElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(@$icon->data_values->url); ?>" target="_blank">
                                    <?php echo @$icon->data_values->social_icon; ?>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/partials/footer.blade.php ENDPATH**/ ?>