@extends($activeTemplate.'layouts.auth')

@section('content')
<section class="pt-50 pb-50 contact-section overflow-hidden">
    <div class="shape-one"></div>
    <div class="shape-two"></div>
    <div class="shape-three"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card custom--card">
                    <div class="card-header bg--dark">
                        <h5 class="card-title text-white">@lang('Change Password')</h5>
                    </div>
                     
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">@lang('Current Password')</label>
                                <input type="password" class="form-control form--control" name="current_password" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Password')</label>
                                <input type="password" class="form-control form--control" name="password" required autocomplete="current-password">
                                @if($general->secure_password)
                                    <div class="input-popup">
                                      <p class="error lower">@lang('1 small letter minimum')</p>
                                      <p class="error capital">@lang('1 capital letter minimum')</p>
                                      <p class="error number">@lang('1 number minimum')</p>
                                      <p class="error special">@lang('1 special character minimum')</p>
                                      <p class="error minimum">@lang('6 character password')</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Confirm Password')</label>
                                <input type="password" class="form-control form--control" name="password_confirmation" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@if($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif