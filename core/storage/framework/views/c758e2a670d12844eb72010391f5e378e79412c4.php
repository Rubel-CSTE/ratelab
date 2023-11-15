<?php
$content    = getContent('category.content', true);
$categories = App\Models\Category::with('company')
            ->where('status', Status::ENABLE)
            ->whereHas('company', function ($q) {
                $q->where('status', Status::ENABLE);
            })->latest()->get();
?>
<section class="pt-100 pb-100 section--bg category-section glass--overlay">
    <div class="circle-shape"></div>
    <div class="square-shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center mb-4">
                    <h2 class="section-title style--two"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="category-list">
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('company.category',[$category->id,slug($category->name)])); ?>" class="category-list__single">
                            <?php echo @$category->icon; ?>
                            <span><?php echo e(__(@$category->name)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <span><?php echo e(__($emptyMessage)); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\wamp64\www\fxbrokeview\core\resources\views/templates/basic/sections/category.blade.php ENDPATH**/ ?>