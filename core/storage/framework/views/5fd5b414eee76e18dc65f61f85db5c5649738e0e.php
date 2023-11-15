<link rel="stylesheet" href="<?php echo e(asset('assets/global/css/iziToast.min.css')); ?>">
<script src="<?php echo e(asset('assets/global/js/iziToast.min.js')); ?>"></script>
<?php if(session()->has('notify')): ?>
    <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            "use strict";
            iziToast.<?php echo e($msg[0]); ?>({message:"<?php echo e(__($msg[1])); ?>", position: "topRight"});
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($errors) && $errors->any()): ?>
    <?php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    ?>

    <script>
        "use strict";
        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        iziToast.error({
            message: '<?php echo e(__($error)); ?>',
            position: "topRight"
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>

<?php endif; ?>
<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>

<?php /**PATH /home/fxbrizdp/public_html/core/resources/views/partials/notify.blade.php ENDPATH**/ ?>