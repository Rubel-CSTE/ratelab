<?php
$content = getContent('faq.content', true);
$elements = getContent('faq.element', false, null, true);
?>
<div class="section py-5"
    style="background-image: url(<?php echo e(getImage('assets/images/frontend/faq/' . @$content->data_values->image)); ?>)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="accordion custom--accordion" id="accordionExample">
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php echo e(!$loop->first ? 'collapsed' : null); ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq_<?php echo e($loop->index); ?>"
                                    aria-expanded="<?php echo e(!$loop->first ? 'false' : 'true'); ?>">
                                    <?php echo e(__(@$item->data_values->question)); ?>

                                </button>
                            </h2>
                            <div id="faq_<?php echo e($loop->index); ?>"
                                class="accordion-collapse collapse <?php echo e($loop->first ? 'show' : null); ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> <?php echo e(__(@$item->data_values->answer)); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/templates/basic/sections/faq.blade.php ENDPATH**/ ?>