<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('S.N.'); ?></th>
                                    <th title="Username"><?php echo app('translator')->get('Reviewer'); ?></th>
                                    <th><?php echo app('translator')->get('Company'); ?></th>
                                    <th><?php echo app('translator')->get('Review'); ?></th>
                                    <th><?php echo app('translator')->get('Rating'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td> <?php echo e($reviews->firstItem() + $loop->index); ?> </td>
                                        <td>
                                            <span class="d-block fw-bold"><?php echo e(__(@$review->user->fullname)); ?></span>
                                            <a href="<?php echo e(route('admin.users.detail', $review->user_id)); ?>">
                                                <span>@<span><?php echo e($review->user->username); ?></span></span>
                                            </a>
                                        </td>
                                        <td> <?php echo e(__($review->company->name)); ?> </td>
                                        <td class="showReview" data-review="<?php echo e($review->review); ?>">
                                            <?php echo e(strLimit($review->review, 35)); ?>

                                        </td>
                                        <td class="text--orange"> <?php  echo rating(@$review->rating);  ?> </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline--primary viewReview"
                                                data-review="<?php echo e($review->review); ?>"
                                                data-reviewer="<?php echo e($review->user->fullname); ?>">
                                                <i class="la la-desktop"></i> <?php echo app('translator')->get('View'); ?>
                                            </button>

                                            <button class="btn btn-sm btn-outline--danger confirmationBtn"
                                                data-question="<?php echo app('translator')->get('Are you sure to delete the review?'); ?>"
                                                data-action="<?php echo e(route('admin.review.delete', [$review->id, $review->company->id])); ?>">
                                                <i class="la la-trash"></i> <?php echo app('translator')->get('Delete'); ?>
                                            </button>

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
                <?php if($reviews->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo  paginateLinks($reviews) ?>
                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>

    <!--View Modal -->
    <div id="viewReview" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="modal-body show-review"></div>
                </div>

                <div class="modal-footer">
                    <button type="submit" data-bs-dismiss="modal" class="btn btn--dark"><?php echo app('translator')->get('Close'); ?></button>
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

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            $('.viewReview').on('click', function() {
                var modal = $('#viewReview');
                let reviewer = $(this).data('reviewer');
                modal.find('.modal-title').text("<?php echo app('translator')->get('Review & Rating by'); ?> " + reviewer);
                $(".show-review").text($(this).data('review'))
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/review/index.blade.php ENDPATH**/ ?>