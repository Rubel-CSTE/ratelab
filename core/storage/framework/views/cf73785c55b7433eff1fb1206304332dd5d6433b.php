<?php
$content = getContent('banner.content', true);
?>
<section class="hero bg_img"
    style="background-image: url('<?php echo e(getImage('assets/images/frontend/banner/' . @$content->data_values->image, '1920x840')); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 text-md-start text-center">
                <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5" data-wow-delay="0.3s">
                    <?php echo e(__($content->data_values->heading)); ?></h2>
                <p class="hero__description mt-2 wow fadeInUp" data-wow-duration="0.5" data-wow-delay="0.5s">
                    <?php echo e(__($content->data_values->subheading)); ?></p>
            </div>
        </div>
        <div class="row mt-lg-5 mt-4">
            <div class="col-lg-6 col-md-8">
                <form action="<?php echo e(route('company.search')); ?>" class="hero__search-form wow fadeInUp"
                    data-wow-duration="0.5" data-wow-delay="0.7s">
                    <input type="text" name="search" class="form--control" placeholder="<?php echo app('translator')->get('Search Here...'); ?>"
                        required>
                    <button type="submit" class="btn btn--base"><?php echo app('translator')->get('Search'); ?></button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\wamp64\www\fxbrokeview\core\resources\views/templates/basic/partials/banner.blade.php ENDPATH**/ ?>