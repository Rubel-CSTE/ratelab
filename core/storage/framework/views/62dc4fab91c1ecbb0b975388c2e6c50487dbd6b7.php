<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Slug'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $pdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(__($data->name)); ?></td>
                                    <td><?php echo e(__($data->slug)); ?></td>
                                    <td>
                                        <div class="button--group">
                                            <a href="<?php echo e(route('admin.frontend.manage.section', $data->id)); ?>" class="btn btn-sm btn-outline--primary"><i class="la la-pen"></i> <?php echo app('translator')->get('Edit'); ?></a>
                                            <?php if($data->is_default == Status::NO): ?>
                                                <button class="btn btn-sm btn-outline--danger confirmationBtn"
                                                data-action="<?php echo e(route('admin.frontend.manage.pages.delete',$data->id)); ?>"
                                                data-question="<?php echo app('translator')->get('Are you sure to remove this page?'); ?>">
                                                    <i class="las la-trash"></i> <?php echo app('translator')->get('Delete'); ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>

    
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <?php echo app('translator')->get('Add New Page'); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.frontend.manage.pages.save')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> <?php echo app('translator')->get('Page Name'); ?></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>
                        </div>
                        <div class="form-group">
                            <label> <?php echo app('translator')->get('Slug'); ?></label>
                            <input type="text" class="form-control" name="slug" value="<?php echo e(old('slug')); ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
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
    <button type="button" class="btn btn-sm btn-outline--primary addBtn"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        (function ($) {
            "use strict";

            $('.addBtn').on('click', function () {
                var modal = $('#addModal');
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });

        })(jQuery);

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/frontend/builder/pages.blade.php ENDPATH**/ ?>