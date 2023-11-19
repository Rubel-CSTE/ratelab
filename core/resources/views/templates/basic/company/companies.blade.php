@php
    $adShowAfterColum = 4;
@endphp

@forelse ($companies as $k => $company)

    <div class="col-lg-6">
        <div class="company-review has--link">
            <a href="{{ route('company.details', [$company->id, slug($company->name)]) }}" class="item--link"></a>
            <div class="company-review__top">
                <div class="thumb">
                    <img src="{{ getImage(getFilePath('company') . '/' . @$company->image, getFileSize('company')) }}" alt="@lang('logo')" />

                    @if ($company->user_id == auth()->id())
                        <span class="auth-company">
                            <i class="la la-user" aria-hidden="true"></i>
                        </span>
                    @endif
                </div>
                <div class="content">
                    <div class="company-review__name d-flex flex-wrap justify-content-between">
                        <div class="left-side">
                            <h6>
                                <a href="{{ route('company.details', [$company->id, slug($company->name)]) }}">{{ @$company->name }}</a>
                            </h6>
                            <p class="cate-name fs--14px"><i class="las la-certificate"></i>{{ __($company->category->name) }}</p>
                        </div>
                        @php
                            $colorCode = getStarColor($company->avg_rating);
                        @endphp
                        <div style="color: {{ $colorCode }}"
                            class="text-right {{ $colorCode === null ? 'text--base' : '' }}">
                            @php echo avgRating($company->avg_rating); @endphp
                            <p class="fs--14px text-muted"> &nbsp; {{ $company->avg_rating }}
                                ({{ @$company->reviews_count }}
                                @lang('ratings'))
                            </p>
                        </div>
                    </div>
                </div>
                <span class="fs--14px mt-2 lh-1"><i class="las la-map-marker"></i> {{ @$company->address }}</span>
            </div>
            <div class="company-review__ratings mt-3 text--base">
                <div class="d-flex justify-content-between">
                    <span class="fs--14px text-muted d-block">@lang('Registered On') : {{ showDateTime($company->created_at, 'd M Y') }}</span>
                </div>
            </div>
            <div class="company-review__tags mt-2">

                @foreach (@$company->tags as $tag)
                    {{ $tag }}
                    {{ !$loop->last ? ', ' : null }}
                @endforeach
            </div>
        </div>
    </div>

    @if ($k + 1 == $adShowAfterColum)
        @php
            $adShowAfterColum += 4;
            echo getAdvertisement('728x90');
        @endphp
    @endif

@empty
    <style>
        .company-review:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            -webkit-transform: translateY(-5px);
            -ms-transform: translateY(-5px);
            transform: translateY(-5px);
        }
    </style>
    @auth
        <div class="container" style="background-color: ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card rounded company-review">
                        <div class="card-body">
                            <div>
                                <h2 class="card-title">{{ __('Can not find a company?') }}</h2>
                                <p class="card-text">{{ __('They might not be listed on ' . @$general->site_name . ' yet. Add them and be the first to write a review!') }}</p>
                            </div>
                            <div class="">
                                <form class="">
                                    <div class="input-group">
                                        <input class="form--control" placeholder="www.example.com" type="text" aria-invalid="false" data-domain-input="true" value="">
                                        <div class="input-group-append">
                                            <a href="{{ route('user.company.create') }}" class="btn btn--base"
                                                type="submit">
                                                <span class="">{{ __('Start') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <!-- Content here -->
        <div class="container company-review">
            <div id="no-results" class="alert alert-light mt-3" role="alert">
                <h6>{{ __('No matching companies found.') }}</h6>
                <div class="form-group mt-3">
                    <label for="email-input">{{ __('Please enter your email to register') }}:</label>
                    <div class="custom-icon-field">
                        <i class="las la-envelope"></i>
                        <input type="email" name="email" value="" autocomplete="off" class="form--control" placeholder="Email address">
                    </div>
                </div>
                <a href="{{ route('user.register') }}" id="registration-btn" class="btn btn--base w-100">{{ __('Register') }}</a>
            </div>
        </div>
    @endguest
@endforelse
<div class="mt-3">
    <ul class="pagination justify-content-end">
        @if ($companies->hasPages())
            {{ paginateLinks($companies) }}
        @endif
    </ul>
</div>
