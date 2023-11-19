@php
    $addShowAfterColum = 3;
@endphp

@if ($myReview && (request()->page == 1 || request()->page == null))
    <div class="customer-review mb-3">
        <div class="customer-review__thumb">
            <img src="{{ getImage(getFilePath('userProfile') . '/' . @$myReview->user->image, getFileSize('userProfile')) }}"
                alt="image" />
        </div>
        <div class="customer-review__content">
            <div class="customer-review__header">
                <div class="left">
                    <h6>{{ __(@$myReview->user->fullname) }}</h6>
                    <span><i class="la la-map-marker-alt"></i>{{ __(@$myReview->user->address->country) }}</span>
                </div>
                <div class="right">
                    @php
                        $colorCode = getStarColor($myReview->rating);
                    @endphp
                    <div style="color: {{ $colorCode }}" class="{{ $colorCode === null ? 'ratings' : '' }} d-flex align-items-center justify-content-end">
                        @php
                            echo rating(@$myReview->rating);
                        @endphp
                    </div>
                </div>
            </div>
            <div class="customer-review__body">
                <p> {{ __(@$myReview->review) }}</p>
            </div>

            @if (auth()->id() == $myReview->user_id)
                <div class="customer-review__footer">
                    <div class="left">
                        <ul class="customer-review__action-list">
                            <li>
                                <button class="edit-review" type="button" data-bs-toggle="modal"
                                    data-bs-target="#reviewUpdateModal" data-id="{{ $myReview->id }}"
                                    data-review="{{ $myReview->review }}" data-rating="{{ $myReview->rating }}"><i
                                        class="la la-edit text--base"></i>
                                    @lang('Edit Review')
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <ul class="customer-review__action-list">
                            <li>
                                <button class="delete-review" type="button" data-bs-toggle="modal"
                                    data-bs-target="#reviewDeleteModal" data-id="{{ $myReview->id }}"><i
                                        class="la la-trash-alt text--danger"></i>@lang('Delete')</button>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endif

@foreach ($reviews as $review)
    <div class="customer-review mb-3">
        <div class="customer-review__thumb">
            <img src="{{ getImage(getFilePath('userProfile') . '/' . @$review->user->image, getFileSize('userProfile')) }}"
                alt="image" />
        </div>
        <div class="customer-review__content">
            <div class="customer-review__header">
                <div class="left">
                    <h6>{{ __(@$review->user->fullname) }}</h6>
                    <span><i class="la la-map-marker-alt"></i>{{ __(@$review->user->address->country) }}</span>
                </div>
                <div class="right">
                    <div class="ratings d-flex align-items-center justify-content-end">
                        @php
                            echo rating(@$review->rating);
                        @endphp
                    </div>
                </div>
            </div>
            <div class="customer-review__body">
                <p> {{ __(@$review->review) }}</p>
            </div>
        </div>
    </div>

    @if ($loop->index + 1 == $addShowAfterColum)
        @php
            $addShowAfterColum += 3;
        @endphp
        <div class="my-3">
            @php
                echo getAdvertisement('728x90');
            @endphp
        </div>
    @endif
@endforeach
<div>
    <ul class="pagination justify-content-end me-3">
        @if ($reviews->hasPages())
            {{ paginateLinks($reviews) }}
        @endif
    </ul>
</div>
@if(empty($myReview) === true && count($reviews) === 0)
<div class="review-block">
    <div class="customer-review d-flex justify-content-center">
        <h5>@lang('No review yet!')</h5>
    </div>
</div>
@endif
