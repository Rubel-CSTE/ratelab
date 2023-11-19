@extends($activeTemplate.'layouts.frontend')
@php
$content = getContent('breadcrumb.content', true);
@endphp
@section('content')
    <section class="section--bg pb-100">
        <div class="company-details-bg bg_img d-lg-block d-none" style="background-image: url('{{ getImage('assets/images/frontend/breadcrumb/' . @$content->data_values->image, '1920x840') }}');">
        </div>
        <div class="company-details-header">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 ps-xxl-5">
                        <div class="row gy-4">
                            <div class="col-md-8 text-md-start text-center">
                                <div class="company-profile">
                                    <h3 class="company-profile__name">{{ $company->name }}</h3>
                                    <span><i class="las la-map-marker-alt"></i>{{ $company->address }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="company-website section--bg2 text-center has--link">
                                    <a target="__blank" href="{{ $company->url }}" class="item--link"></a>
                                    <h6 class="fs--16px text-white"><i
                                            class="las la-external-link-alt"></i>{{ $company->url }}</h6>
                                    <span class="fs--12px text-white">@lang('Visit this site')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="company-sidebar">
                        <div class="row gy-5">
                            <div class="company-sidebar__widget col-lg-12 col-md-5">
                                <div class="company-overview">
                                    <div class="company-overview__thumb">
                                        <img src="{{ getImage(getFilePath('company').'/'. $company->image) }}"
                                            alt="image">
                                    </div>
                                </div>
                            </div><!-- company-sidebar__widget end -->
                            <div class="company-sidebar__widget col-lg-12 col-md-7">
                                <div class="rating-area d-flex flex-wrap align-items-center justify-content-between mb-4">
                                    <div class="rating">{{ showAmount(@$company->avg_rating) }}</div>
                                    <div class="content">
                                        @php
                                            $colorCode = getStarColor($company->avg_rating);
                                        @endphp
                                        <div style="color: {{ $colorCode }}" class="{{ $colorCode === null ? 'ratings' : '' }} d-flex align-items-center justify-content-end fs--18px">
                                            @php
                                                echo avgRating($company->avg_rating);
                                            @endphp
                                        </div>
                                        <span class="mt-1 text-muted fs--14px">@lang('Based on')
                                            {{ @$company->reviews_count }} @lang('Reviews')</span>
                                    </div>
                                </div>

                                @for ($i = 5; $i >= 1; $i--)
                                    @php
                                        $reviewCount = $company->reviews->where('rating', $i)->count();
                                        $percentage = 0;
                                        if ($reviewCount) {
                                            $percentage = ($reviewCount / $company->reviews_count) * 100;
                                        }
                                    @endphp

                                    <div class="single-review">
                                        <p class="star">{{ $i }} <i class="las la-star text--base"></i></p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="percentage">{{ showAmount($percentage) }}%</span>
                                    </div>
                                @endfor
                            </div>

                            <div class="company-sidebar__widget col-lg-12">
                                <div class="single-company-info">
                                    <h5 class="single-company-info__title">@lang('About') {{ __($company->name) }}</h5>
                                    <p class="mt-2"> {{ __(@$company->description) }} </p>
                                </div>
                                <div class="single-company-info">
                                    <h5 class="single-company-info__title">@lang('Tags')</h5>
                                    <div class=" mt-3">
                                        @foreach (@$company->tags as $tag)
                                            {{ $tag }}
                                            @if (!$loop->last),@endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="single-company-info">
                                    <h5 class="single-company-info__title">@lang('Contact Info')</h5>
                                    <ul class="single-company-info__list">
                                        <li>
                                            <div class="icon"><i class="las la-link"></i></div>
                                            <div class="content">
                                                <a href="{{ @$company->url }}">{{ @$company->url }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="las la-map-marker-alt"></i></div>
                                            <div class="content">
                                                 <p>{{ __(@$company->address) }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="las la-envelope"></i></div>
                                            <div class="content">
                                                <a href="mailto:{{ @$company->email }}">{{ @$company->email }}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            
                            <!--Advertisement-->
                            <div class="has--link mt-4">
                                @php
                                    echo getAdvertisement('300x250');
                                @endphp
                            </div>

                        </div><!-- row end -->
                    </div>
                </div>
                <div class="col-lg-8 ps-xxl-5 mt-5">
                  
                    @auth
                        @if(!$myReview)
                        <div class="give-rating-area mb-5">
                            <form action="{{ route('company.user.review', $company->id) }}" method="post">
                                @csrf
                                <div class="give-rating-person">
                                    <div class="thumb">
                                        <img src="{{getImage(getFilePath('userProfile') .'/'. auth()->user()->image, getFileSize('userProfile'))}}" />
                                    </div>
                                    <div class="content">
                                        <h6>{{ auth()->user()->fullname }}</h6>
                                    </div>
                                    <div class='give-rating'>
                                        @for ($i = 5; $i >= 1; $i--)
                                            <span>
                                                <input id='str{{ $i }}' name='rating' type='radio' value='{{ $i }}'>
                                                <label for='str{{ $i }}'><i class="la la-star fa-sm"></i></label>
                                            </span>
                                        @endfor
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <textarea name="review" class="form--control" placeholder="@lang('Write review')" required>{{ old('review') }}</textarea>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn--base submitBtn" disabled>@lang('Submit')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    @else
                        <div class="give-rating-area mb-5">
                            <p class="text-center">@lang('You need to')
                                <a href="{{ route('user.login') }}"  class="text--base">@lang('Login')</a> @lang(' first to submit your review.')
                            </p>
                        </div>

                    @endauth
                    <div class="customer-review-wrapper">
                        @include($activeTemplate . 'partials.company_review')
                    </div>
                </div>
            </div>
        </div>

        <!-- update review modal -->
        <div class="modal fade" id="reviewUpdateModal" tabindex="-1" aria-labelledby="reviewUpdateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
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
                                        <div class="t-company-content">
                                            <h6 class="view-company"></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class=' give-rating-update text--base'>
                                        @for ($i = 5; $i >= 1; $i--)
                                            <span id="existed-rating-{{ $i }}">
                                                <input id='star{{ $i }}' name='rating' type='radio' value='{{ $i }}'>
                                                <label for='star{{ $i }}'> <i class="las la-star fa-sm"></i></label>
                                            </span>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="edit-id" value="" name="id">
                            <textarea name="review" class="form--control edit-review"></textarea>
                            <div class="text-end">
                                <button type="submit" class="btn btn--base">@lang('Update')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- review delete modal -->
        <div class="modal fade" id="reviewDeleteModal" tabindex="-1" aria-labelledby="reviewDeleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
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
    </section>
@endsection

@push('script')
    <script>
        "use strict";
        $(document).ready(function() {

           let x  = $('[name=rating]').on('click', function(){
               $('.submitBtn').removeAttr('disabled');
           });
            //

            //update review
                let result = $('.edit-review').data();
                $('.edit-id').val(result.id);
                $('#reviewUpdateModal').find('.edit-review').val(result.review);

                var existRating = result.rating;

                if (existRating == 5) {
                    $('#existed-rating-5').addClass('checked');
                } else if (existRating == 4) {
                    $('#existed-rating-4').addClass('checked');
                } else if (existRating == 3) {
                    $('#existed-rating-3').addClass('checked');
                } else if (existRating == 2) {
                    $('#existed-rating-2').addClass('checked');
                } else {
                    $('#existed-rating-1').addClass('checked');
                }
            

            //delete review
            $('.delete-review').on('click', function() {
                $('.delete-id').val($(this).data('id'));
            });

            //prime review Radio-box
            $(".give-rating input:radio").attr("checked", false);

            $(".give-rating input").click(function(e) {
                $(this).parent().siblings().removeClass("checked");
                $(this).parent().addClass("checked");
            });

            //update review Radio-box
            $(".give-rating-update input:radio").attr("checked", false);

            $(".give-rating-update input").click(function(e) {
                $(this).parent().siblings().removeClass("checked");
                $(this).parent().addClass("checked");
            });
        });
    </script>
@endpush
