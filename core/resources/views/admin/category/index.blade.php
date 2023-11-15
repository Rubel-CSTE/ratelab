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
                                    <th>@lang('Name')</th>
                                    <th>@lang('Icon')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                                        <td>{{ __($category->name) }}</td>
                                        <td> @php echo @$category->icon;  @endphp</td>
                                        <td> @php echo $category->statusBadge @endphp </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline--primary editBtn cuModalBtn" data-resource="{{ $category }}"    data-modal_title="@lang('Edit Category')" data-has_status="1">
                                                <i class="la la-pencil"></i>@lang('Edit')
                                            </button>

                                            @if($category->status == Status::DISABLE)
                                                <button type="button" class="btn btn-sm btn-outline--success ms-1  confirmationBtn"
                                                        data-action="{{ route('admin.category.status', $category->id) }}"
                                                        data-question="@lang('Are you sure to enable this category?')">
                                                    <i class="la la-eye"></i> @lang('Enable')
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-outline--danger  confirmationBtn"
                                                data-action="{{ route('admin.category.status', $category->id) }}"
                                                data-question="@lang('Are you sure to disable this category?')">
                                                        <i class="la la-eye-slash"></i> @lang('Disable')
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($categories->hasPages())
                    <div class="card-footer py-4">
                        @php echo paginateLinks($categories) @endphp
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!--Cu Modal -->
    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Icon')</label>
                            <div class="input-group">
                                <input type="text" class="form-control iconPicker" autocomplete="off" name="icon" value="{{ old('icon') }}" required>
                                <span class="input-group-text  input-group-addon" data-icon="la la-home" role="iconpicker"> <i class="lab la-accessible-icon"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-confirmation-modal />
@endsection

@push('style-lib')
<link href="{{ asset('assets/admin/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin/js/fontawesome-iconpicker.js') }}"></script>
@endpush

@push('breadcrumb-plugins')
<x-search-form />
<button type="button" class="btn btn-sm btn-outline--primary h-45 cuModalBtn" data-modal_title="@lang('Add New Category')">
    <i class="las la-plus"></i>@lang('Add New')
</button>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            $('.editBtn').on('click', function(){
                let resource = $(this).data('resource');
                $('#cuModal').find('.iconpicker-container .input-group-text').html(resource.icon);
            });

            $('.iconPicker').iconpicker().on('iconpickerSelected', function (e) {
                $(this).closest('.form-group').find('.iconpicker-input').val(`<i class="${e.iconpickerValue}"></i>`);
            });

        })(jQuery);
    </script>
@endpush
