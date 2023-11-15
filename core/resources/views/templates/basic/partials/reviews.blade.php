@php $addShowAfterColum = 3; @endphp

@forelse ($reviews as $k => $review)
    <div class="review-block">
        <p class="mb-2 mt-4">
            @lang('Review of') <a href="{{ route('company.details', [$review->company_id, slug($review->company->name)]) }}" class="font-weight-bold text--base">{{ __($review->company->name) }}</a>
        </p>
        <div class="customer-review">
            <div class="customer-review__thumb">
                    <img src="{{getImage(getFilePath('company') .'/'. $review->company->image, getFileSize('company'))}}" />
            </div>
            <div class="customer-review__content">
                <div class="customer-review__header">
                    <div class="left">
                        <h6>{{ auth()->user()->fullname }}</h6>
                        <span><i class="la la-map-marker-alt"></i>{{ auth()->user()->address->country }}</span>
                    </div>
                    <div class="right">
                        <div class="ratings d-flex align-items-center justify-content-end">
                            @php
                                echo rating($review->rating);
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="customer-review__body">
                    <p>{{ __($review->review) }}</p>
                </div>
                <div class="customer-review__footer">
                    <div class="left">
                        <ul class="customer-review__action-list">
                            <li>

                                <button class="edit-review" type="button" data-bs-toggle="modal" data-bs-target="#reviewUpdateModal" data-resource="{{ $review }}"  data-img="{{getImage(getFilePath('company') .'/'. $review->company->image, getFileSize('company'))}}">
                                    <i class="la la-edit"></i>
                                    @lang('Edit Review')
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <ul class="customer-review__action-list">
                            <li>
                                <button class="delete-review" type="button" data-bs-toggle="modal" data-bs-target="#reviewDeleteModal"
                                data-id="{{ $review->id }}"><i class="la la-trash-alt"></i>@lang('Delete')</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- advertisement Block -->
    @if ($k + 1 == $addShowAfterColum)
        @php
            $addShowAfterColum += 3;
        @endphp
        <div class="my-3">
            @php
                echo getAdvertisement('728x90');
            @endphp
        </div>
    @endif

@empty
    <div class="bg-white p-5 rounded">
        <h5 class="text-center"> @lang('No review yet')</h5>
    </div>
@endforelse

@if ($reviews->hasPages())
<div class="col-12 mt-1">
    <ul class="list list--row justify-content-center align-items-center">
        {{ paginateLinks($reviews) }}
    </ul>
</div>
@endif


<!-- review update modal -->
<div class="modal fade" id="reviewUpdateModal" tabindex="-1" aria-labelledby="reviewUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewUpdateModalLabel">@lang('Update Review')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.review.update') }}" method="POST">
                    @csrf
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <div class="t-company-thumb">
                                    <img src="#" alt="image" class="view-image">
                                </div>
                                <div class="t-company-content">
                                    <h6 class="view-company"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='give-rating text--base'>
                                <span id="existed-rating-1">
                                    <input id='str5' name='rating' type='radio' value='5'>
                                    <label for='str5'><i class="la la-star"></i></label>
                                </span>
                                <span id="existed-rating-2">
                                    <input id='str4' name='rating' type='radio' value='4'>
                                    <label for='str4'><i class="la la-star"></i></label>
                                </span>
                                <span id="existed-rating-3">
                                    <input id='str3' name='rating' type='radio' value='3'>
                                    <label for='str3'><i class="la la-star"></i></label>
                                </span>
                                <span id="existed-rating-4">
                                    <input id='str2' name='rating' type='radio' value='2'>
                                    <label for='str2'><i class="la la-star"></i></label>
                                </span>
                                <span id="existed-rating-5">
                                    <input id='str1' name='rating' type='radio' value='1'>
                                    <label for='str1'><i class="la la-star"></i></label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="edit-id" value="" name="id">
                    <textarea name="review" class="form--control edit-review"
                        placeholder="@lang('Write your review')"></textarea>
                    <div class="text-end">
                        <button type="submit" class="btn btn--base w-100">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- review delete modal -->
<div class="modal fade" id="reviewDeleteModal" tabindex="-1" aria-labelledby="reviewDeleteModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="reviewDeleteModalLabel">@lang('Confirmation Alert')</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>@lang('Are you sure to delete this review?')</p>
        </div>
        <div class="modal-footer">
            <form action="{{ route('user.review.delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="" class="delete-id">
                <button type="button" class="btn btn-sm btn--dark" data-bs-dismiss="modal">@lang('No')</button>
                <button type="submit" class="btn btn-sm btn--base">@lang('Yes')</button>
            </form>
        </div>
    </div>
</div>
</div>
