<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form action="" class="notify-form">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Subject'); ?> </label>
                                    <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('Email subject'); ?>" name="subject"  required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Message'); ?> </label>
                                    <textarea name="message" rows="10" class="form-control nicEdit"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn w-100 h-45 btn--primary me-2"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<div class="modal fade" data-bs-backdrop="static" id="notificationSending">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('Notification Sending'); ?></h5>
            </div>
            <div class="modal-body">
                <h4 class="text--danger text-center"><?php echo app('translator')->get('Don\'t close or refresh the window till finish'); ?></h4>
                <div class="mail-wrapper">
                    <div class= "mail-icon world-icon"><i class="las la-globe"></i></div>
                    <div class='mailsent'>
                        <div class='envelope'>
                            <i class='line line1'></i>
                            <i class='line line2'></i>
                            <i class='line line3'></i>
                            <i class="icon fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class= "mail-icon mail-icon"><i class="las la-envelope-open-text"></i></div>
                </div>
                <div class="mt-3">
                    <div class="progress">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                    <p><?php echo app('translator')->get('Email sent'); ?> <span class="sent">0</span> <?php echo app('translator')->get('users out of'); ?> <?php echo e($users); ?> <?php echo app('translator')->get('users'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <span class="text--primary"><?php echo app('translator')->get('Notification will send via '); ?> <?php if($general->en): ?> <span class="badge badge--warning"><?php echo app('translator')->get('Email'); ?></span> <?php endif; ?> <?php if($general->sn): ?> <span class="badge badge--warning"><?php echo app('translator')->get('SMS'); ?></span> <?php endif; ?></span>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
<script>
    (function($){
        "use strict"
        $('.notify-form').on('submit',function(e){
            e.preventDefault();
            $('.progress-bar').css('width', `0%`);
            $('.progress-bar').text(`0%`);
            $('.sent').text(0);
            $('#notificationSending').modal('show');
            postMail($(this),0);
        });

        function postMail(form,skip){

            var _token = form.find('[name=_token]').val();
            var subject = form.find('[name=subject]').val();
            var message = form.find('.nicEdit-main').html();

            $.post("<?php echo e(route('admin.users.notification.all.send')); ?>", {
                "subject":subject,
                "_token":_token,
                "skip":skip,
                "message":message
            },function (response) {
                if(response.error){
                    response.error.forEach(error => {
                        notify('error',error)
                        $('.sent').text(response.total_sent);
                    });
                }else{
                    var rest =  <?php echo e($users); ?> - response.total_sent;
                    var sentPercent = response.total_sent / <?php echo e($users); ?> * 100;
                    if (sentPercent > 100) {
                        sentPercent = 100;
                    }
                    sentPercent = sentPercent.toFixed(0)
                    $('.progress-bar').css('width', `${sentPercent}%`);
                    $('.progress-bar').text(`${sentPercent}%`);
                    $('.sent').text(response.total_sent);
                    if(rest == 0){
                        setTimeout(() => {
                            $('#notificationSending').modal('hide');
                            form.find('[name=subject]').val('');
                            form.find('.nicEdit-main').html('<span></span>');
                            notify('success','Mail sent to all users successfully')
                        }, 3000);
                        return false;
                    }
                    setTimeout(()=>{
                        postMail(form,response.total_sent);
                    },1000);
                }
            });
        }

    })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/users/notification_all.blade.php ENDPATH**/ ?>