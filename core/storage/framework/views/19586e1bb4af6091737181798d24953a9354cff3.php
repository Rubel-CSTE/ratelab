<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
      <div class="col-md-12 mb-30">
            <div class="card bl--5-primary">
                <div class="card-body">
                    <p class="text--primary"><?php echo app('translator')->get('From this page, you can add/update CSS for the user interface. Changing content on this page required programming knowledge.'); ?></p>
                    <p class="text--warning"><?php echo app('translator')->get('Please do not change/edit/add anything without having proper knowledge of it. The website may misbehave due to any mistake you have made.'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6><?php echo app('translator')->get('Write Custom CSS'); ?></h6>
                </div>
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group custom-css">
                            <textarea class="form-control customCss" rows="10" name="css"><?php echo e($file_content); ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
    .CodeMirror{
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        line-height: 1.3;
        height: 500px;
    }
    .CodeMirror-linenumbers{
      padding: 0 8px;
    }
  ​
    .custom-css p, .custom-css li, .custom-css span{
      color: white;
    }
  ​
    .cm-s-monokai span.cm-tag{
        margin-left: 15px;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/codemirror.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/monokai.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/codemirror.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/css.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/sublime.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script>
    "use strict";
    var editor = CodeMirror.fromTextArea(document.getElementsByClassName("customCss")[0], {
      lineNumbers: true,
      mode: "text/css",
      theme: "monokai",
      keyMap: "sublime",
      autoCloseBrackets: true,
      matchBrackets: true,
      showCursorWhenSelecting: true,
      matchBrackets: true
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/setting/custom_css.blade.php ENDPATH**/ ?>