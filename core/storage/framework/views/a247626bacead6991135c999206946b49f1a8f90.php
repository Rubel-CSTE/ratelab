<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.frontend.sections.content', 'seo')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="data">
                        <input type="hidden" name="seo_image" value="1">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url(<?php echo e(getImage(getFilePath('seo').'/'. @$seo->data_values->image,getFileSize('seo'))); ?>)">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image_input" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--primary"><?php echo app('translator')->get('Upload Image'); ?></label>
                                                <small class="mt-2"><?php echo app('translator')->get('Supported files'); ?>: <b><?php echo app('translator')->get('jpeg'); ?>, <?php echo app('translator')->get('jpg'); ?>, <?php echo app('translator')->get('png'); ?></b>. <?php echo app('translator')->get('Image will be resized into'); ?> <?php echo e(getFileSize('seo')); ?><?php echo app('translator')->get('px'); ?>. </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Meta Keywords'); ?></label>
                                    <small class="ms-2 mt-2  "><?php echo app('translator')->get('Separate multiple keywords by'); ?> <code>,</code>(<?php echo app('translator')->get('comma'); ?>) <?php echo app('translator')->get('or'); ?> <code><?php echo app('translator')->get('enter'); ?></code> <?php echo app('translator')->get('key'); ?></small>
                                    <select name="keywords[]" class="form-control select2-auto-tokenize"  multiple="multiple" required>
                                        <?php if(@$seo->data_values->keywords): ?>
                                            <?php $__currentLoopData = $seo->data_values->keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($option); ?>" selected><?php echo e(__($option)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Meta Description'); ?></label>
                                    <textarea name="description" rows="3" class="form-control" required><?php echo e(@$seo->data_values->description); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Social Title'); ?></label>
                                    <input type="text" class="form-control" name="social_title" value="<?php echo e(@$seo->data_values->social_title); ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Social Description'); ?></label>
                                    <textarea name="social_description" rows="3" class="form-control" required><?php echo e(@$seo->data_values->social_description); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    (function ($) {
        "use strict";
        $('.select2-auto-tokenize').select2({
            dropdownParent: $('.card-body'),
            tags: true,
            tokenSeparators: [',']
        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/frontend/seo.blade.php ENDPATH**/ ?>