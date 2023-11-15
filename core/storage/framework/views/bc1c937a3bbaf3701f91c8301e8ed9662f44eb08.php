<?php
    $content = getContent('breadcrumb.content', true);
?>
<!-- inner hero start -->
<section class="inner-hero bg_img overlay--one" style="background-image: url('<?php echo e(getImage('assets/images/frontend/breadcrumb/' . @$content->data_values->image, '1920x840')); ?>');">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 class="page-title text-white"><?php echo e(__($pageTitle)); ?></h2>
        </div>
      </div>
    </div>
  </section>
    <!-- inner hero end -->
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/partials/breadcrumb.blade.php ENDPATH**/ ?>