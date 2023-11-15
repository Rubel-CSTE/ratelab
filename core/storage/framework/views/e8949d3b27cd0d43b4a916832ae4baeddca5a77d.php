<?php $__env->startSection('content'); ?>
    <section class="pt-100 pb-100 contact-section overflow-hidden">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post rounded-3">
                            <div class="blog-post__thumb rounded-2">
                                <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>"
                                    class="d-block w-100 h-100">
                                    <img src="<?php echo e(getImage('assets/images/frontend/blog/thumb_' . @$blog->data_values->image, '415x230')); ?>"
                                        alt="<?php echo app('translator')->get(' Blog'); ?>" class="rounded-2">
                                </a>
                                <span class="blog-post__date"><i class="far fa-calendar-alt me-1"></i>
                                    <?php echo e(showDateTime($blog->created_at, 'd-M-Y')); ?></span>
                            </div>
                            <div class="blog-post__content">
                                <h5 class="blog-post__title">
                                    <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>">
                                        <?php echo e(__(strLimit($blog->data_values->title, 80))); ?></a>
                                </h5>
                                <p class="mt-2">
                                    <?php
                                        echo __(strLimit(strip_tags($blog->data_values->description), 130));
                                    ?>
                                </p>
                                <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>"
                                    class="blog-post__btn mt-3">
                                    <?php echo app('translator')->get('Read More'); ?>
                                    <i class="las la-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($blogs->hasPages()): ?>
                    <div class="col-12">
                        <ul class="list list--row justify-content-center align-items-center t-mt-6">
                            <?php echo e(paginateLinks($blogs)); ?>

                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

   

    <div class="pt-100">
        <?php if($sections->secs != null): ?>
            <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make($activeTemplate . 'sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

    <div title="Food factory Ltd" class="rating--here-4" style="text-align: center; margin: 25px auto 25px;"></div><script>fetch("http://localhost:81/u-ratelab/company/rating/eyJpdiI6ImtGcVNlcmN6M0RMejY2RXJ1bExDMnc9PSIsInZhbHVlIjoiUzJnT2ttRG5kQ05LSlJzc2JvZWoxUT09IiwibWFjIjoiNTBkOTcwZTg3OGYwM2Q4NTYzMjljNmIwODNkY2Y0MmI4YTQ2YTBjY2ZhNWYyZmU0N2RhNDAwODJiZTZjZjE0MSIsInRhZyI6IiJ9").then((t=>t.json())).then((t=>{let a=t.rating?t.rating:0,s=0,e="",l=document.getElementsByClassName("rating--here-4"),n=t=>e+='<img width="25px" style="margin: 5px auto 5px;" src="'+t+'"/>';for(;s<5;)n(a-s>=1?"http://localhost:81/u-ratelab/assets/images/full-star.svg":a-s>0?"http://localhost:81/u-ratelab/assets/images/half-star.svg":"http://localhost:81/u-ratelab/assets/images/blank-star.svg"),s++;for(let a=0;a<l.length;a++)l[a].innerHTML="<div >"+e+"</div> <h6>"+t.rating+t.outOf+'</h6><a href="http://localhost:81/u-ratelab/company/4/food-factory-ltd" style="color: #d38a04;" target="_blank" class="text--base">Powered By : Ratelab </a>'})).catch((function(t){console.warn("Something went wrong in script.",t)})); </script>

<?php $__env->stopSection(); ?>

    




<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/blog.blade.php ENDPATH**/ ?>