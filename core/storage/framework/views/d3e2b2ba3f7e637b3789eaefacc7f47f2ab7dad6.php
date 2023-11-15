<?php $__env->startSection('panel'); ?>

    <div class="row gy-4">


        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-header bg--primary d-flex justify-content-between flex-wrap">
                        <h4 class="card-title text-white"> <?php echo e(__(keyToTitle($temp['name']))); ?> </h4>
                        <?php if($general->active_template == $temp['name']): ?>
                        <button type="submit" name="name" value="<?php echo e($temp['name']); ?>" class="btn btn--info">
                            <?php echo app('translator')->get('SELECTED'); ?>
                        </button>
                        <?php else: ?>
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <button type="submit" name="name" value="<?php echo e($temp['name']); ?>" class="btn btn--success w-100">
                                <?php echo app('translator')->get('SELECT'); ?>
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="card-body p-0">
                        <img src="<?php echo e($temp['image']); ?>" alt="<?php echo app('translator')->get('Template'); ?>" class="w-100">
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php if($extra_templates): ?>
            <?php $__currentLoopData = $extra_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg--primary"><h4 class="card-title text-white"> <?php echo e(__(keyToTitle($temp['name']))); ?> </h4></div>
                        <div class="card-body">
                            <img src="<?php echo e($temp['image']); ?>" alt="<?php echo app('translator')->get('Template'); ?>" class="w-100">
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo e($temp['url']); ?>" target="_blank" class="btn btn--primary w-100"><?php echo app('translator')->get('Get This'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/frontend/templates.blade.php ENDPATH**/ ?>