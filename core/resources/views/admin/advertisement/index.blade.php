@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light">
                            <thead>
                                <tr>
                                    <th>@lang('S.N.')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Size')</th>
                                    <th>@lang('Impression')</th>
                                    <th>@lang('Click')</th>
                                    <th>@lang('Redirect')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($advertisements as $advertisement)
                                    <tr>
                                        <td> {{ $advertisements->firstItem() + $loop->index }} </td>
                                        <td> {{ __(@$advertisement->type) }} </td>
                                        <td>  {{ __(@$advertisement->size) }} </td>
                                        <td>
                                            <span class="badge badge--dark"> {{ @$advertisement->impression }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge--primary">
                                                {{ @$advertisement->click }}
                                            </span>
                                        </td>
                                        <td>
                                            <a target="_blank" class="text--info" href="{{ @$advertisement->redirect_url }}">
                                                <i class="las la-external-link-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @php echo $advertisement->statusBadge @endphp
                                        </td>

                                        <td>
                                            <button type="button" data-image="{{ getImage(getFilePath('advertisement').'/'.@$advertisement->value,) }}" data-advertisement="{{ json_encode($advertisement->only('id', 'type', 'value', 'size', 'redirect_url', 'status')) }}" class="btn btn-sm btn-outline--primary editBtn">
                                                <i class="la la-edit"></i> @lang('Edit')
                                            </button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($advertisements->hasPages())
                    <div class="card-footer py-4">
                        @php echo paginateLinks($advertisements) @endphp
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>


    {{-- ========Create Modal========= --}}
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
                <form class="form-horizontal" method="post" action="{{ route('admin.advertisement.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>@lang('Advertisement Type')</label>
                                    <select class="form-control" id="__type" name="type" required>
                                        <option value="" selected disabled>@lang('Select One')</option>
                                        <option value="image">@lang('Image')</option>
                                        <option value="script">@lang('Script')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="image-size">
                                        <label>@lang('Size')</label>
                                        <select class="form-control" id="__size" name="size" required>
                                            <option value="" selected>@lang('Select One')</option>
                                            <option value="728x90">@lang('728x90')</option>
                                            <option value="300x250">@lang('300x250')</option>
                                            <option value="300x600">@lang('300x600')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="__image">
                                <div class="form-group">

                                    <div class="image-upload mt-3">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <label for="" class="font-weight-bold">@lang('Image') <strong
                                                        class="text-danger">*</strong></label>
                                                <div class="profilePicPreview" style="background-position: center;">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" size-validation="" class="profilePicUpload d-none"
                                                    name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload" class="bg--primary mt-3">@lang('Upload
                                                    Image')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files'):
                                                    <b>@lang('jpeg,jpg,png,gif') <span id="__image_size"></span></b>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required">@lang('Redirect Url') </label>
                                    <input type="text" class="form-control" name="redirect_url"
                                        placeholder="@lang('Redirect Url')">
                                </div>
                            </div>

                            <div class="col-lg-12" id="__script">
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">@lang('Script') <strong class="text-danger">*</strong> </label>
                                    <textarea name="script" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="status"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('breadcrumb-plugins')
<x-search-form />
<button type="button" class="btn btn-sm h-45 btn-outline--primary __advertisement">
    <i class="la la-plus"></i>@lang('Add New')
</button>
@endpush

@push('style')
    <style>
        #__script,
        #__image {
            display: none;
        }

    </style>
@endpush




@push('script')
    <script>
        (function($) {

            ///=======open modal=========
            $(".__advertisement").on('click', function(e) {
                let modal = $("#modal");
                modal.find(".modal-title").text("@lang('Add Advertisement')");
                modal.find('form')[0].reset();
                $(modal).find('#__image').css('display', 'none');
                $(modal).find('#__script').css('display', 'none');
                $(modal).find('#btn-save').text("@lang('Submit')");

                let size = modal.find("#__size");
                size.find('option').show();

                let type = modal.find("#__type");
                type.find('option').show();
                $('.status').empty();
                let action = "{{ route('admin.advertisement.store') }}";
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
                    alert("@lang('Please first select type')")
                    $("#__type").focus();
                    size.val("");
                    return;
                }

                if (type == "image") {
                    let placeholderImageUrl = `{{ route('placeholder.image', ':size') }}`;
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
                let action = "{{ route('admin.advertisement.store', ':id') }}";


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
                modal.find("#modalLabel").text("@lang('Edit Advertisement')");

                $(modal).find('#btn-save').text("@lang('Update')");

                modal.find('.status').html(`
                <div class="form-group">
                        <label class="font-weight-bold">@lang('Status')</label>
                        <input type="checkbox" data-onstyle="-success" data-offstyle="-danger" data-height="40" data-bs-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Deactivate')" data-width="100%" name="status">
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
@endpush
