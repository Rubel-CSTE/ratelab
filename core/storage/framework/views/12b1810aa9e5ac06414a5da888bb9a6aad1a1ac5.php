<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('S.N.'); ?></th>
                                    <th><?php echo app('translator')->get('User'); ?> </th>
                                    <th><?php echo app('translator')->get('Email-URL'); ?></th>

                                    <th><?php echo app('translator')->get('Category'); ?></th>
                                    <?php if(request()->routeIs('admin.company.index')): ?>
                                        <th><?php echo app('translator')->get('Status'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($companies->firstItem() + $loop->index); ?></td>
                                        <td>
                                            <span class="fw-bold">
                                                    <?php echo e(__($company->name)); ?>

                                            </span>
                                            <br>
                                            <a href="<?php echo e(route('admin.users.detail', $company->user_id)); ?>">
                                                <span>@<span><?php echo e($company->user->username); ?></span></span>
                                            </a>
                                        </td>

                                        <td>
                                            <?php echo e($company->email); ?>

                                            <br />
                                            <a target="__blank" href="<?php echo e($company->url); ?>"><?php echo e($company->url); ?></a>
                                        </td>
                                        <td>
                                            <?php echo e(__($company->category->name)); ?>

                                        </td>

                                        <?php if(request()->routeIs('admin.company.index')): ?>
                                            <td>
                                                <?php echo $company->statusBadge ?>
                                            </td>
                                        <?php endif; ?>

                                        <td>
                                            <a href="<?php echo e(route('admin.company.details', $company->id)); ?>"
                                                class="btn btn-sm btn-outline--primary">
                                                <i class="la la-desktop"></i><?php echo app('translator')->get('Details'); ?>
                                            </a>
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

                <?php if($companies->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($companies)); ?>

                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-form','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/company/index.blade.php ENDPATH**/ ?>