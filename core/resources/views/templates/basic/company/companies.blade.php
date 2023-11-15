<div class="d-none countResult">
    {{ $companies->total() }} @lang(' items found')
</div>

@php
    $adShowAfterColum = 4;
@endphp

@forelse ($companies as $k => $company)

    <div class="col-lg-6">
        <div class="company-review has--link">
            <a href="{{ route('company.details', [$company->id, slug($company->name)]) }}" class="item--link"></a>
            <div class="company-review__top">
                <div class="thumb">
                   
                    
                <img src="{{getImage(getFilePath('company').'/'.@$company->image, getFileSize('company'))}}" alt="@lang('logo')" />

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
                            <p class="cate-name fs--14px"><i class="las la-certificate"></i> {{ __($company->category->name) }}</p>
                        </div>
                        <div class="text-right text--base">
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
    <div class="review-block">
        <div class="customer-reviewdd">
            <div class="d-flex justify-content-center">
                <h5> {{ __($emptyMessage) }}</h5>
            </div>
        </div>
    </div>
@endforelse
<div class="mt-3">
    <ul class="pagination justify-content-end">
        @if ($companies->hasPages())
            {{ paginateLinks($companies) }}
        @endif
    </ul>
</div>
