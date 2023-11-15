<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Extension'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="user">
                                            <div class="thumb"><img src="<?php echo e(getImage(getFilePath('extensions') .'/'. $extension->image,getFileSize('extensions'))); ?>" alt="<?php echo e(__($extension->name)); ?>" class="plugin_bg"></div>
                                            <span class="name"><?php echo e(__($extension->name)); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                            echo $extension->statusBadge;
                                        ?>
                                    </td>
                                    <td>
                                        <div class="button--group">
                                            <button type="button" class="btn btn-sm btn-outline--primary ms-1 mb-2 editBtn"
                                                    data-name="<?php echo e(__($extension->name)); ?>"
                                                    data-shortcode="<?php echo e(json_encode($extension->shortcode)); ?>"
                                                    data-action="<?php echo e(route('admin.extensions.update', $extension->id)); ?>">
                                                <i class="la la-cogs"></i> <?php echo app('translator')->get('Configure'); ?>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline--dark ms-1 mb-2 helpBtn"
                                                    data-description="<?php echo e(__($extension->description)); ?>"
                                                    data-support="<?php echo e(__($extension->support)); ?>">
                                                <i class="la la-question"></i> <?php echo app('translator')->get('Help'); ?>
                                            </button>
                                            <?php if($extension->status == Status::DISABLE): ?>
                                                <button type="button"
                                                        class="btn btn-sm btn-outline--success ms-1 mb-2 confirmationBtn"
                                                        data-action="<?php echo e(route('admin.extensions.status', $extension->id)); ?>"
                                                        data-question="<?php echo app('translator')->get('Are you sure to enable this extension?'); ?>">
                                                    <i class="la la-eye"></i> <?php echo app('translator')->get('Enable'); ?>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-outline--danger mb-2 confirmationBtn"
                                                data-action="<?php echo e(route('admin.extensions.status', $extension->id)); ?>"
                                                data-question="<?php echo app('translator')->get('Are you sure to disable this extension?'); ?>">
                                                        <i class="la la-eye-slash"></i> <?php echo app('translator')->get('Disable'); ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Update Extension'); ?>: <span class="extension-name"></span></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-12 control-label fw-bold"><?php echo app('translator')->get('Script'); ?></label>
                            <div class="col-md-12">
                                <textarea name="script" class="form-control" required rows="8" placeholder="<?php echo app('translator')->get('Paste your script with proper key'); ?>"><?php echo e(old('script')); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45" id="editBtn"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div id="helpModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Need Help'); ?>?</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ConfirmationModal::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\ConfirmationModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b)): ?>
<?php $component = $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b; ?>
<?php unset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="d-flex flex-wrap justify-content-end gap-2 align-items-center">
        <div class="d-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search_table" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Search'); ?>...">
                <button class="btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";

            $(document).on('click', '.editBtn',function () {
                var modal = $('#editModal');
                var shortcode = $(this).data('shortcode');

                modal.find('.extension-name').text($(this).data('name'));
                modal.find('form').attr('action', $(this).data('action'));

                var html = '';
                $.each(shortcode, function (key, item) {
                    html += `<div class="form-group">
                        <label class="col-md-12 control-label fw-bold">${item.title}</label>
                        <div class="col-md-12">
                            <input name="${key}" class="form-control" placeholder="--" value="${item.value}" required>
                        </div>
                    </div>`;
                })
                modal.find('.modal-body').html(html);

                modal.modal('show');
            });

            $(document).on('click', '.helpBtn',function () {
                var modal = $('#helpModal');
                var path = "<?php echo e(asset(getFilePath('extensions'))); ?>";
                modal.find('.modal-body').html(`<div class="mb-2">${$(this).data('description')}</div>`);
                if ($(this).data('support') != 'na') {
                    modal.find('.modal-body').append(`<img src="${path}/${$(this).data('support')}">`);
                }
                modal.modal('show');
            });

        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/extension/index.blade.php ENDPATH**/ ?>