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
                                    <th><?php echo app('translator')->get('Type'); ?></th>
                                    <th><?php echo app('translator')->get('Size'); ?></th>
                                    <th><?php echo app('translator')->get('Impression'); ?></th>
                                    <th><?php echo app('translator')->get('Click'); ?></th>
                                    <th><?php echo app('translator')->get('Redirect'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td> <?php echo e($advertisements->firstItem() + $loop->index); ?> </td>
                                        <td> <?php echo e(__(@$advertisement->type)); ?> </td>
                                        <td>  <?php echo e(__(@$advertisement->size)); ?> </td>
                                        <td>
                                            <span class="badge badge--dark"> <?php echo e(@$advertisement->impression); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge--primary">
                                                <?php echo e(@$advertisement->click); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <a target="_blank" class="text--info" href="<?php echo e(@$advertisement->redirect_url); ?>">
                                                <i class="las la-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $advertisement->statusBadge ?>
                                        </td>

                                        <td>
                                            <button type="button" data-image="<?php echo e(getImage(getFilePath('advertisement').'/'.@$advertisement->value,)); ?>" data-advertisement="<?php echo e(json_encode($advertisement->only('id', 'type', 'value', 'size', 'redirect_url', 'status'))); ?>" class="btn btn-sm btn-outline--primary editBtn">
                                                <i class="la la-edit"></i> <?php echo app('translator')->get('Edit'); ?>
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
                <?php if($advertisements->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo paginateLinks($advertisements) ?>
                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>


    
    <div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo e(route('admin.advertisement.store')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Advertisement Type'); ?></label>
                                    <select class="form-control" id="__type" name="type" required>
                                        <option value="" selected disabled><?php echo app('translator')->get('Select One'); ?></option>
                                        <option value="image"><?php echo app('translator')->get('Image'); ?></option>
                                        <option value="script"><?php echo app('translator')->get('Script'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="image-size">
                                        <label><?php echo app('translator')->get('Size'); ?></label>
                                        <select class="form-control" id="__size" name="size" required>
                                            <option value="" selected><?php echo app('translator')->get('Select One'); ?></option>
                                            <option value="728x90"><?php echo app('translator')->get('728x90'); ?></option>
                                            <option value="300x250"><?php echo app('translator')->get('300x250'); ?></option>
                                            <option value="300x600"><?php echo app('translator')->get('300x600'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="__image">
                                <div class="form-group">

                                    <div class="image-upload mt-3">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <label for="" class="font-weight-bold"><?php echo app('translator')->get('Image'); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <div class="profilePicPreview" style="background-position: center;">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" size-validation="" class="profilePicUpload d-none"
                                                    name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload" class="bg--primary mt-3"><?php echo app('translator')->get('Upload
                                                    Image'); ?></label>
                                                <small class="mt-2 text-facebook"><?php echo app('translator')->get('Supported files'); ?>:
                                                    <b><?php echo app('translator')->get('jpeg,jpg,png,gif'); ?> <span id="__image_size"></span></b>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required"><?php echo app('translator')->get('Redirect Url'); ?> </label>
                                    <input type="text" class="form-control" name="redirect_url"
                                        placeholder="<?php echo app('translator')->get('Redirect Url'); ?>">
                                </div>
                            </div>

                            <div class="col-lg-12" id="__script">
                                <div class="form-group">
                                    <label for="" class="font-weight-bold"><?php echo app('translator')->get('Script'); ?> <strong class="text-danger">*</strong> </label>
                                    <textarea name="script" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="status"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
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
<button type="button" class="btn btn-sm h-45 btn-outline--primary __advertisement">
    <i class="la la-plus"></i><?php echo app('translator')->get('Add New'); ?>
</button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        #__script,
        #__image {
            display: none;
        }

    </style>
<?php $__env->stopPush(); ?>




<?php $__env->startPush('script'); ?>
    <script>
        (function($) {

            ///=======open modal=========
            $(".__advertisement").on('click', function(e) {
                let modal = $("#modal");
                modal.find(".modal-title").text("<?php echo app('translator')->get('Add Advertisement'); ?>");
                modal.find('form')[0].reset();
                $(modal).find('#__image').css('display', 'none');
                $(modal).find('#__script').css('display', 'none');
                $(modal).find('#btn-save').text("<?php echo app('translator')->get('Submit'); ?>");

                let size = modal.find("#__size");
                size.find('option').show();

                let type = modal.find("#__type");
                type.find('option').show();
                $('.status').empty();
                let action = "<?php echo e(route('admin.advertisement.store')); ?>";
                modal.find('form').attr('action', action);
                modal.modal('show');
            });

            $(document).on('change', '#__type', function(e) {
                let value = $(this).val();
                if (value == 'script') {
                    $(document).find('#__image').css('display', 'none');
                    $(document).find('#__script').css('display', 'block');
                } else {
                    $(document).find('#__script').css('display', 'none');

                }
            });

            $(document).on('change', '#__size', function(e) {

                let size = $(this);
                let type = $("#__type").val();
                if (type == null || type.length <= 0) {
                    alert("<?php echo app('translator')->get('Please first select type'); ?>")
                    $("#__type").focus();
                    size.val("");
                    return;
                }

                if (type == "image") {
                    let placeholderImageUrl = `<?php echo e(route('placeholder.image', ':size')); ?>`;
                    $(document).find('.image-upload').css('display', 'block')
                    $(document).find('.profilePicPreview').css('background-image',
                        `url(${placeholderImageUrl.replace(':size',size.val())})`)
                    $(document).find('#__image_size').text(`, Upload Image Size Must Be ${size.val()} px`);
                    $(document).find("#imageUpload").attr('size-validation', size.val())

                    changeImagePreview();
                }

            });

            $(document).on('click', '.editBtn', function(e) {
                let advertisement = JSON.parse($(this).attr('data-advertisement'));

                let modal = $("#modal");
                let action = "<?php echo e(route('admin.advertisement.store', ':id')); ?>";


                let size = modal.find("#__size");
                size.val(advertisement.size);
                size.find('option').not(':selected').hide();

                let type = modal.find("#__type");
                type.val(advertisement.type);
                type.find('option').not(':selected').hide();

                if (advertisement.type == "image") {
                    $(modal).find('.profilePicPreview').css('background-image', `url(${$(this).data('image')})`);


                    $(modal).find('.image-upload').css('display', 'block')
                    modal.find('textarea[name=script]').text("");
                    changeImagePreview();
                } else {
                    $(document).find('#__image').css('display', 'none');
                    $(document).find('#__script').css('display', 'block');
                    modal.find('textarea[name=script]').text(advertisement.value);
                    $(modal).find('.profilePicPreview').css('background-image', `url("")`)
                }
                modal.find('form').attr('action', action.replace(":id", advertisement.id));
                modal.find('input[name=redirect_url]').val(advertisement.redirect_url);
                modal.find("#modalLabel").text("<?php echo app('translator')->get('Edit Advertisement'); ?>");

                $(modal).find('#btn-save').text("<?php echo app('translator')->get('Update'); ?>");

                modal.find('.status').html(`
                <div class="form-group">
                        <label class="font-weight-bold"><?php echo app('translator')->get('Status'); ?></label>
                        <input type="checkbox" data-onstyle="-success" data-offstyle="-danger" data-height="40" data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('Active'); ?>" data-off="<?php echo app('translator')->get('Deactivate'); ?>" data-width="100%" name="status">
                    </div>
                `);

                modal.find("[name=status]").bootstrapToggle();

                if(advertisement.status != 0) {

                    modal.find("[name=status]").bootstrapToggle("on");
                } else {
                    modal.find("[name=status]").bootstrapToggle("off");
                }

                modal.modal('show');
            });

            function changeImagePreview() {
                let selectSize = $(document).find("#__size").val();
                let size = selectSize.split('x');
                $(document).find('#__image').css('display', 'block');
                $(document).find('#__script').css('display', 'none');
                $(document).find(".profilePicPreview").css({
                    'width': `${size[0]}px`,
                    'height': `${size[1]}px`
                });
            }

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fxbrizdp/public_html/core/resources/views/admin/advertisement/index.blade.php ENDPATH**/ ?>