@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="pt-50 pb-50 contact-section overflow-hidden section--bg">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-10">
                    <form action="{{ route('user.company.update', $company->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="custom--card">
                            <div class="card-header bg--dark">
                                <h5 class="text-white">@lang('Update Company Info')</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="required">@lang('Image') </label>
                                            <div class="profile-thumb justify-content-center">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview"
                                                        style="background-image: url('{{ getImage(getFilePath('company') .'/'. $company->image, getFileSize('company')) }}');">
                                                    </div>

                                                    <div class="avatar-edit">
                                                        <input type='file' class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg"/>
                                                        <label for="profilePicUpload1" class="btn btn--base mb-0"><i class="las la-camera"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>@lang('Company Name')</label>
                                            <input type="text" name="name" class="form--control" value="{{ $company->name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('Category')</label>
                                            <select name="category" class="form--control" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                     @selected($category->id == $company->category_id)>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label>@lang('URL')</label>
                                        <input type="text" name="url" class="form--control" value="{{ $company->url }}" required>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('Email')</label>
                                        <input type="email" name="email" class="form--control" value="{{ $company->email }}" required>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('Address')</label>
                                        <input type="text" name="address" class="form--control" value="{{ $company->address }}" required>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('Tags')</label>
                                        <select name="tags[]" class="form--control select2-auto-tokenize" multiple="multiple" required>
                                            @foreach ($company->tags as $item)
                                                <option value="{{ $item }}" selected>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 form-group">
                                        <label>@lang('Description') </label>
                                        <textarea name="description" class="form--control" required>{{ $company->description }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn--base w-100"> <i class="la la-telegram-plane"></i> @lang('Submit')</button>
                                </div><!-- row end -->
                            </div>
                        </div>

                    </form>
                </div>
                <div class="has--link">
                    <div class="d-flex justify-content-center mt-5">
                        @php echo getAdvertisement('728x90'); @endphp
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}">
    <style>
        .select2-selection,
        .select2-selection--multiple {
            padding: 0.625rem 1.25rem;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -ms-border-radius: 8px;
            -o-border-radius: 8px;
            color: #000;
        }
    </style>
@endpush
@push('script')
    <!-- seldct 2 js -->
    <script src="{{ asset('assets/admin/js/vendor/select2.min.js') }}"></script>
    <script>
        // js for Multiple select-2 with tokenize
        $(".select2-auto-tokenize").select2({
            tags: true,
            tokenSeparators: [',']
        });
    </script>

    <script>
        function proPicURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = $(input).parents('.profile-thumb').find('.profilePicPreview');
                    $(preview).css('background-image', 'url(' + e.target.result + ')');
                    $(preview).addClass('has-image');
                    $(preview).hide();
                    $(preview).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".profilePicUpload").on('change', function() {
            proPicURL(this);
        });
    </script>
@endpush
