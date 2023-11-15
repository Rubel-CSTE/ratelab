<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30 justify-content-center">
        <div class="col-6 mb-30">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">
                        <?php echo app('translator')->get('Details of '); ?> <span class="fw-bold"><?php echo e(__(@$company->name)); ?></span>
                    </h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Create Date'); ?>
                            <span class="fw-bold"> <?php echo e(showDateTime($company->created_at)); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Website Link'); ?>
                            <a href="<?php echo e($company->url); ?>"><?php echo e($company->url); ?></a>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('E-mail'); ?>
                            <span class="fw-bold"><?php echo e($company->email); ?>

                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Username'); ?>
                            <span class="fw-bold">
                                <a href="<?php echo e(route('admin.users.detail', $company->user_id)); ?>"><?php echo e(@$company->user->username); ?></a>
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Status'); ?>
                            <?php echo $company->statusBadge ?>
                        </li>

                        <?php if($company->admin_feedback): ?>
                            <li class="list-group-item">
                                <?php echo app('translator')->get('Admin Feedback'); ?>
                                <br>
                                <p class="fw-bold"><?php echo e($company->admin_feedback); ?></p>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php if($company->status == Status::PENDING): ?>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button class="btn btn-outline--primary ml-1 ConfirmModalBtn" data-BS-toggle="tooltip"
                                    data-title="<?php echo app('translator')->get('Approve'); ?>" data-id="<?php echo e($company->id); ?>"
                                    data-status=<?php echo e(Status::APPROVED); ?> data-name="<?php echo e($company->name); ?>">
                                    <i class="la la-check"></i> <?php echo app('translator')->get('Approve'); ?>
                                </button>
                                <button class="btn btn-outline--danger ml-1 ConfirmModalBtn" data-BS-toggle="tooltip"
                                    data-original-title="<?php echo app('translator')->get('Reject'); ?>" data-id="<?php echo e($company->id); ?>"
                                    data-status=<?php echo e(Status::REJECTED); ?> data-name="<?php echo e($company->name); ?>">
                                    <i class="la la-ban"></i> <?php echo app('translator')->get('Reject'); ?>
                                </button>
                            </div>
                        </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>

    
    <div id="approveRejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.company.status',$company->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="status">
                    <div class="modal-body">
                        <strong class="info"></strong>
                        <textarea name="details" class="form-control pt-3" rows="3" placeholder="<?php echo app('translator')->get('Provide the details...'); ?>" required=""></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"> <?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.ConfirmModalBtn').on('click', function() {
                var modal = $('#approveRejectModal');

                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.company-name').text($(this).data('name'));
                let status = $(this).data('status');
                modal.find('[name=status]').val(status);

                if (status == 1) {
                    modal.find('.modal-title').text(`<?php echo app('translator')->get('Approval Confirmation!'); ?>`)
                    modal.find('.info').text(`<?php echo app('translator')->get('Have you sent approval info'); ?>?`)
                } else{
                    modal.find('.info').text(`<?php echo app('translator')->get('Have you sent rejection info'); ?>?`)
                    modal.find('.modal-title').text('Rejection Confirmation!');
                }
                modal.modal('show');
            });

            $('.rejectBtn').on('click', function() {
                var modal = $('#rejectModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.company-name').text($(this).data('name'));
                modal.modal('show');
            });
            $('.pendingBtn').on('click', function() {
                var modal = $('#pendingModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.company-name').text($(this).data('name'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/company/details.blade.php ENDPATH**/ ?>