@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30 justify-content-center">
        <div class="col-6 mb-30">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">
                        @lang('Details of ') <span class="fw-bold">{{ __(@$company->name) }}</span>
                    </h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Create Date')
                            <span class="fw-bold"> {{ showDateTime($company->created_at) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Website Link')
                            <a href="{{ $company->url }}">{{ $company->url }}</a>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('E-mail')
                            <span class="fw-bold">{{ $company->email }}
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="fw-bold">
                                <a href="{{ route('admin.users.detail', $company->user_id) }}">{{ @$company->user->username }}</a>
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                            @php echo $company->statusBadge @endphp
                        </li>

                        @if ($company->admin_feedback)
                            <li class="list-group-item">
                                @lang('Admin Feedback')
                                <br>
                                <p class="fw-bold">{{ $company->admin_feedback }}</p>
                            </li>
                        @endif
                    </ul>
                    @if ($company->status == Status::PENDING)
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button class="btn btn-outline--primary ml-1 ConfirmModalBtn" data-BS-toggle="tooltip"
                                    data-title="@lang('Approve')" data-id="{{ $company->id }}"
                                    data-status={{ Status::APPROVED }} data-name="{{ $company->name }}">
                                    <i class="la la-check"></i> @lang('Approve')
                                </button>
                                <button class="btn btn-outline--danger ml-1 ConfirmModalBtn" data-BS-toggle="tooltip"
                                    data-original-title="@lang('Reject')" data-id="{{ $company->id }}"
                                    data-status={{ Status::REJECTED }} data-name="{{ $company->name }}">
                                    <i class="la la-ban"></i> @lang('Reject')
                                </button>
                            </div>
                        </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    {{-- APPROVE/REJECT MODAL --}}
    <div id="approveRejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.company.status',$company->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status">
                    <div class="modal-body">
                        <strong class="info"></strong>
                        <textarea name="details" class="form-control pt-3" rows="3" placeholder="@lang('Provide the details...')" required=""></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary"> @lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
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
                    modal.find('.modal-title').text(`@lang('Approval Confirmation!')`)
                    modal.find('.info').text(`@lang('Have you sent approval info')?`)
                } else{
                    modal.find('.info').text(`@lang('Have you sent rejection info')?`)
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
@endpush
