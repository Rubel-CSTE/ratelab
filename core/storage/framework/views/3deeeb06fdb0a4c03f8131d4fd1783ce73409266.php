<?php
    $content = getContent('blog.content', true);
    $blogs = getContent('blog.element', false, 3);
?>
<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-6">
                <div class="section-header text-center wow fadeInUp" data-wow-duration="0.5" data-wow-delay="0.3s">
                    <div class="section-subtitle border-left-right text--base">
                        <?php echo e(__(@$content->data_values->subheading)); ?></div>
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center gy-4">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-post rounded-3">
                        <div class="blog-post__thumb rounded-2">
                            <a href="<?php echo e(route('blog.details', [$blog->id, slug($blog->data_values->title)])); ?>" class="d-block w-100 h-100">
                                <img src="<?php echo e(getImage('assets/images/frontend/blog/thumb_' . @$blog->data_values->image, '415x230')); ?>"
                                    alt="<?php echo app('translator')->get(" Blog"); ?>" class="rounded-2">
                            </a>
                            <span class="blog-post__date">
                                <i class="far fa-calendar-alt me-1"></i> <?php echo e(showDateTime($blog->created_at, 'Y-M-d')); ?>

                            </span>
                        </div>

                        <div class="blog-post__content">
                            <h5 class="blog-post__title">
                                <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title),$blog->id])); ?>"> <?php echo e(__(strLimit($blog->data_values->title, 80))); ?></a>
                            </h5>
                            <p class="mt-2">
                                <?php echo __(strLimit(strip_tags($blog->data_values->description), 90));?>
                            </p>
                            <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title),$blog->id])); ?>" class="blog-post__btn mt-3">
                                <?php echo app('translator')->get('Read More'); ?> <i class="las la-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/sections/blog.blade.php ENDPATH**/ ?>