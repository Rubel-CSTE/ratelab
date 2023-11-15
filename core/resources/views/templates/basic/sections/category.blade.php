@php
$content    = getContent('category.content', true);
$categories = App\Models\Category::with('company')
            ->where('status', Status::ENABLE)
            ->whereHas('company', function ($q) {
                $q->where('status', Status::ENABLE);
            })->latest()->get();
@endphp
<section class="pt-100 pb-100 section--bg category-section glass--overlay">
    <div class="circle-shape"></div>
    <div class="square-shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center mb-4">
                    <h2 class="section-title style--two">{{ __(@$content->data_values->heading) }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="category-list">
                    @forelse ($categories as $category)
                        <a href="{{ route('company.category',[$category->id,slug($category->name)]) }}" class="category-list__single">
                            @php echo @$category->icon; @endphp
                            <span>{{ __(@$category->name) }}</span>
                        </a>
                    @empty
                        <span>{{ __($emptyMessage) }}</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
