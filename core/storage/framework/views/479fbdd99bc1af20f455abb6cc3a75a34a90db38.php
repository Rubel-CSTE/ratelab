<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Email-Phone'); ?></th>
                                    <th><?php echo app('translator')->get('Country'); ?></th>
                                    <th><?php echo app('translator')->get('Joined At'); ?></th>
                                    <th><?php echo app('translator')->get('Companies'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold"><?php echo e($user->fullname); ?></span>
                                            <br>
                                            <span class="small">
                                                <a href="<?php echo e(route('admin.users.detail', $user->id)); ?>"><span>@</span><?php echo e($user->username); ?></a>
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo e($user->email); ?> <br> <?php echo e($user->mobile); ?>

                                        </td>
                                        <td>
                                            <span class="fw-bold"
                                                title="<?php echo e(@$user->address->country); ?>"><?php echo e($user->country_code); ?></span>
                                        </td>
                                        <td>
                                            <?php echo e(showDateTime($user->created_at)); ?> <br> <?php echo e(diffForHumans($user->created_at)); ?>

                                        </td>
                                        <td>
                                            <?php if($user->companies_count): ?>
                                                <a href="<?php echo e(route('admin.company.index', $user->id)); ?>">
                                                    <div class="badge badge--success text--dark"><?php echo e($user->companies_count); ?></div>
                                                </a>
                                            <?php else: ?>
                                                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                    'badge',
                                                    'badge--warning' => $user->status == 1,
                                                    'badge--danger text--dark' => $user->status == 0,
                                                ]) ?>"> <?php echo app('translator')->get('No'); ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo e(route('admin.users.detail', $user->id)); ?>"
                                                class="btn btn-sm btn-outline--primary">
                                                <i class="las la-desktop text--shadow"></i> <?php echo app('translator')->get('Details'); ?>
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
                <?php if($users->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($users)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-form','data' => ['placeholder' => 'Username / Email']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Username / Email']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/users/list.blade.php ENDPATH**/ ?>