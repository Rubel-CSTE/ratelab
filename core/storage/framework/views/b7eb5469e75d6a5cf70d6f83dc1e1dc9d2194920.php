<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.frontend.sections.content', $key)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="element">
                        <?php if(@$data): ?>
                            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                        <?php endif; ?>
                        <div class="row">
                            <?php
                                $imgCount = 0;
                            ?>
                            <?php $__currentLoopData = $section->element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($k == 'images'): ?>
                                    <?php
                                        $imgCount = collect($content)->count();
                                    ?>
                                    <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgKey => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4">
                                                <input type="hidden" name="has_image[]" value="1">
                                                <div class="form-group">
                                                    <label><?php echo e(__(keyToTitle($imgKey))); ?></label>
                                                    <div class="image-upload">
                                                        <div class="thumb">
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview" style="background-image: url(<?php echo e(getImage('assets/images/frontend/' . $key .'/'. @$data->data_values->$imgKey,@$section->element->images->$imgKey->size)); ?>)">
                                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="avatar-edit">
                                                                <input type="file" class="profilePicUpload" name="image_input[<?php echo e($imgKey); ?>]" id="profilePicUpload<?php echo e($loop->index); ?>" accept=".png, .jpg, .jpeg">
                                                                <label for="profilePicUpload<?php echo e($loop->index); ?>" class="bg--primary"><?php echo e(__(keyToTitle($imgKey))); ?></label>
                                                                <small class="mt-2  "><?php echo app('translator')->get('Supported files'); ?>: <b><?php echo app('translator')->get('jpeg'); ?>, <?php echo app('translator')->get('jpg'); ?>, <?php echo app('translator')->get('png'); ?></b>.
                                                                    <?php if(@$section->element->images->$imgKey->size): ?>
                                                                        | <?php echo app('translator')->get('Will be resized to'); ?>:
                                                                        <b><?php echo e(@$section->element->images->$imgKey->size); ?></b>
                                                                        <?php echo app('translator')->get('px'); ?>.
                                                                    <?php endif; ?>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="<?php if($imgCount > 1): ?> col-md-12 <?php else: ?> col-md-8 <?php endif; ?>">
                                        <?php $__env->startPush('divend'); ?>
                                    </div>
                                        <?php $__env->stopPush(); ?>

                                    <?php elseif($content == 'icon'): ?>

                                        <div class="form-group">
                                            <label><?php echo e(keyToTitle($k)); ?></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control iconPicker icon" autocomplete="off" name="<?php echo e($k); ?>" required>
                                                <span class="input-group-text  input-group-addon" data-icon="las la-home" role="iconpicker"></span>
                                            </div>
                                        </div>

                                    <?php else: ?>
                                        <?php if($content == 'textarea'): ?>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__(keyToTitle($k))); ?></label>
                                                    <textarea rows="10" class="form-control" name="<?php echo e($k); ?>" required><?php echo e(@$data->data_values->$k); ?></textarea>
                                                </div>
                                            </div>

                                        <?php elseif($content == 'textarea-nic'): ?>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__(keyToTitle($k))); ?></label>
                                                    <textarea rows="10" class="form-control nicEdit" name="<?php echo e($k); ?>" ><?php echo e(@$data->data_values->$k); ?></textarea>
                                                </div>
                                            </div>

                                        <?php elseif($k == 'select'): ?>
                                            <?php
                                                $selectName = $content->name;
                                            ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo e(__(keyToTitle(@$selectName))); ?></label>
                                                        <select class="form-control" name="<?php echo e(@$selectName); ?>" required>
                                                            <?php $__currentLoopData = $content->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectItemKey => $selectOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($selectItemKey); ?>" <?php if(@$data->data_values->$selectName == $selectItemKey): ?> selected <?php endif; ?>><?php echo e(__($selectOption)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                        <?php else: ?>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__(keyToTitle($k))); ?></label>
                                                    <input type="text" class="form-control" name="<?php echo e($k); ?>" value="<?php echo e(@$data->data_values->$k); ?>" required/>
                                                </div>
                                            </div>

                                        <?php endif; ?>
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->yieldPushContent('divend'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit"  class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
<link href="<?php echo e(asset('assets/admin/css/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/fontawesome-iconpicker.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        (function ($) {
            "use strict";
            $('.iconPicker').iconpicker().on('iconpickerSelected', function (e) {
                $(this).closest('.form-group').find('.iconpicker-input').val(`<i class="${e.iconpickerValue}"></i>`);
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/frontend/element.blade.php ENDPATH**/ ?>