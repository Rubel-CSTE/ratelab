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
                                    <th title="Username">@lang('Reviewer')</th>
                                    <th>@lang('Company')</th>
                                    <th>@lang('Review')</th>
                                    <th>@lang('Rating')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reviews as $review)
                                    <tr>
                                        <td> {{ $reviews->firstItem() + $loop->index }} </td>
                                        <td>
                                            <span class="d-block fw-bold">{{ __(@$review->user->fullname) }}</span>
                                            <a href="{{ route('admin.users.detail', $review->user_id) }}">
                                                <span>@<span>{{ $review->user->username }}</span></span>
                                            </a>
                                        </td>
                                        <td> {{ __($review->company->name) }} </td>
                                        <td class="showReview" data-review="{{ $review->review }}">
                                            {{ strLimit($review->review, 35) }}
                                        </td>
                                        <td class="text--orange"> @php  echo rating(@$review->rating);  @endphp </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline--primary viewReview"
                                                data-review="{{ $review->review }}"
                                                data-reviewer="{{ $review->user->fullname }}">
                                                <i class="la la-desktop"></i> @lang('View')
                                            </button>

                                            <button class="btn btn-sm btn-outline--danger confirmationBtn"
                                                data-question="@lang('Are you sure to delete the review?')"
                                                data-action="{{ route('admin.review.delete', [$review->id, $review->company->id]) }}">
                                                <i class="la la-trash"></i> @lang('Delete')
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
                @if ($reviews->hasPages())
                    <div class="card-footer py-4">
                        @php echo  paginateLinks($reviews) @endphp
                    </div>
                @endif
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
                    <button type="submit" data-bs-dismiss="modal" class="btn btn--dark">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />

@endsection

@push('breadcrumb-plugins')
    <x-search-form />
@endpush

@push('script')
    <script>
        (function($) {
            $('.viewReview').on('click', function() {
                var modal = $('#viewReview');
                let reviewer = $(this).data('reviewer');
                modal.find('.modal-title').text("@lang('Review & Rating by') " + reviewer);
                $(".show-review").text($(this).data('review'))
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
