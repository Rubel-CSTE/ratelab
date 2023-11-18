@extends($activeTemplate . 'layouts.master')
@php
    $loginContent = getContent('login.content', true);
@endphp
@section('content')

    <style>
        /* Style for the buttons using the main color */
        .btn-google {
            background-color: #dd4b39;
            color: #fff;
            border: none;
        }

        .btn-facebook {
            background-color: #3b5998;
            color: #fff;
            border: none;
        }
        .btn-apple {
            background-color: #000000;
            color: #fff;
            border: none;
        }
    </style>
    
    <section class="account-section">
        <div class="left bg_img"
            style="background-image: url('{{ getImage('assets/images/frontend/login/' . @$loginContent->data_values->image, '1920x1080') }}');">
            <div class="left-inner text-center">
                <h6 class="text--base">{{ __(@$loginContent->data_values->greeting) }} {{ __($general->site_name) }}</h6>
                <h2 class="title text-white">{{ __(@$loginContent->data_values->heading) }}</h2>
                <p class="mt-3">@lang("Don't have an account?") <a href="{{ route('user.register') }}"
                        class="text--base">@lang('Create Now')</a></p>
            </div>
        </div>

        <div class="right">
            <div class="top w-100 text-center">
                <a class="account-logo" href="{{ route('home') }}">
                    <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="{{ __($general->site_name) }}">
                </a>
            </div>
            <div class="middle w-100 mt-5">
                
                <!-- Google Login Button -->
                <a href="{{ route('google.redirect') }}" class="btn w-100 btn-block btn-google mb-3">
                    <i class="fab fa-google"></i> {{ __('Login with Google') }}
                </a>
    
                <!-- Facebook Login Button -->
                <a href="{{ route('facebook.redirect') }}" class="btn w-100 btn-block btn-facebook mb-3">
                    <i class="fab fa-facebook-f"></i> {{ __('Login with Facebook') }}
                </a>

                <!-- Apple Login Button -->
                <a href="{{ route('apple.redirect') }}" class="btn w-100 btn-block btn-apple mb-3">
                    <i class="fab fa-apple"></i> {{ __('Login with Apple') }}
                </a>
        
                <form class="account-form verify-gcaptcha" method="POST" action="{{ route('user.login') }}">
                    @csrf
                    <div class="form-group">
                        <label>@lang('Username or Email')</label>
                        <input type="text" name="username" autocomplete="off" class="form--control"
                            placeholder="@lang('Username or Email')" required>
                    </div>

                    <div class="form-group">
                        <label>@lang('Password')</label>
                        <div class="input-group">
                            <input type="password" name="password" autocomplete="off" class="form--control"
                                placeholder="@lang('Password')" required>
                            <button type="button" class="input-group-text border-0 bg--base text-white toggle-password">
                                <i class="la la-eye"></i>
                            </button>
                        </div>
                    </div>

                    <x-captcha />

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            @lang('Remember Me')
                        </label>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="recaptcha" class="btn btn--base w-100">@lang('Login')</button>
                    </div>
                    <div class="form-group">
                        <a class=" btn-link text-decoration-none text--base" href="{{ route('user.password.request') }}">
                            @lang('Forgot Password?')
                        </a>
                    </div>
                </form>
            </div>
            <div class="bottom w-100 text-center">
                <p class="mb-0 sm-text text-center">
                    @include($activeTemplate . 'partials.copyright_text')
                </p>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        "use strict";
        //ShowHide-password//
        $(".toggle-password").on('click', function() {
            $(this).find('i').toggleClass("las la-eye-slash");
            var input = $(this).siblings('input');
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endpush
