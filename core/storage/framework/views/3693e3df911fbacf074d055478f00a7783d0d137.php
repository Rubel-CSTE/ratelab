<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label> <?php echo app('translator')->get('Site Title'); ?></label>
                                    <input class="form-control" type="text" name="site_name" required value="<?php echo e($general->site_name); ?>">
                                </div>
                            </div>
                           
                            <div class="form-group col-md-4">
                                <label> <?php echo app('translator')->get('Timezone'); ?></label>
                                <select class="select2-basic" name="timezone">
                                    <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="'<?php echo e(@$timezone); ?>'"><?php echo e(__($timezone)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label> <?php echo app('translator')->get('Site Base Color'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="<?php echo e($general->base_color); ?>"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="base_color" value="<?php echo e($general->base_color); ?>"/>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/spectrum.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/spectrum.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function (color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function () {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('select[name=timezone]').val("'<?php echo e(config('app.timezone')); ?>'").select2();
            $('.select2-basic').select2({
                dropdownParent:$('.card-body')
            });
        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/setting/general.blade.php ENDPATH**/ ?>