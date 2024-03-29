@extends($activeTemplate . 'layouts.master')
@section('content')

<style>
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
    @php
        $regContent = getContent('register.content', true);
        $policyPages = getContent('policy_pages.element', false, null, true);
    @endphp
    <section class="account-section style--two">
        <div class="left bg_img"
            style="background-image: url('{{ getImage('assets/images/frontend/register/' . @$regContent->data_values->image, '1920x1280') }}');">
            <div class="left-inner text-center">
                <h6 class="text--base">@lang('Welcome to ') {{ __($general->site_name) }}</h6>
                <h2 class="title text-white">{{ __(@$regContent->data_values->heading) }}</h2>
                <p class="mt-3">@lang('Have an account?') <a href="{{ route('user.login') }}"
                        class="text--base">@lang('Login Now')</a></p>
            </div>
        </div>

        <div class="right">
            <div class="top w-100 text-center">
                <a class="account-logo" href="{{ route('home') }}">
                    <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="{{ __($general->site_name) }}">
                </a>
            </div>

            <div class="middle w-100">
                <!-- Google Register Button -->
                <a href="{{ route('google.redirect') }}" class="btn w-100 btn-block btn-google mb-3">
                    <i class="fab fa-google"></i> {{ __('Register with Google') }}
                </a>
    
                <!-- Facebook Register Button -->
                <a href="{{ route('facebook.redirect') }}" class="btn w-100 btn-block btn-facebook mb-3">
                    <i class="fab fa-facebook-f"></i> {{ __('Register with Facebook') }}
                </a>

                <!-- Apple Register Button -->
                <a href="{{ route('apple.redirect') }}" class="btn w-100 btn-block btn-apple mb-3">
                    <i class="fab fa-apple"></i> {{ __('Register with Apple') }}
                </a>

                <form action="{{ route('user.register') }}" method="POST" class="account-form verify-gcaptcha">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('First Name')</label>
                                <input type="text" class="form-control form--control" name="firstname"
                                    value="{{ old('firstname') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Last Name')</label>
                                <input type="text" class="form-control form--control" name="lastname"
                                    value="{{ old('lastname') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Username')</label>
                                <input type="text" class="form-control form--control checkUser" name="username"
                                    value="{{ old('username') }}" required>
                                <small class="text-danger usernameExist"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('E-Mail Address')</label>
                                <input type="email" class="form-control form--control checkUser" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Country')</label>
                                <select name="country" class="form-control form--control select-country">
                                    @foreach ($countries as $key => $country)
                                        <option data-mobile_code="{{ $country->dial_code }}"
                                            value="{{ $country->country }}" data-code="{{ $key }}">
                                            {{ __($country->country) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Mobile')</label>
                                <div class="input-group ">
                                    <span class="input-group-text bg--base text-white border-0 mobile-code">

                                    </span>
                                    <input type="hidden" name="mobile_code">
                                    <input type="hidden" name="country_code">
                                    <input type="number" name="mobile" value="{{ old('mobile') }}"
                                        class="form-control form--control checkUser" required>
                                </div>
                                <small class="text-danger mobileExist"></small>
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Password')</label>
                                <input type="password" class="form-control form--control" name="password" required>
                                @if ($general->secure_password)
                                    <div class="input-popup">
                                        <p class="error lower">@lang('1 small letter minimum')</p>
                                        <p class="error capital">@lang('1 capital letter minimum')</p>
                                        <p class="error number">@lang('1 number minimum')</p>
                                        <p class="error special">@lang('1 special character minimum')</p>
                                        <p class="error minimum">@lang('6 character password')</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Confirm Password')</label>
                                <input type="password" class="form-control form--control" name="password_confirmation"
                                    required>
                            </div>
                        </div>

                        <x-captcha />

                    </div>

                    @if ($general->agree)
                        <div class="form-group">
                            <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                            <label for="agree">@lang('I agree with') @foreach ($policyPages as $policy)
                                    <a
                                        href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}">{{ __($policy->data_values->title) }}</a>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </label>
                        </div>
                    @endif
                    <div class="form-group">
                        <button type="submit" id="recaptcha" class="btn btn--base w-100"> @lang('Register')</button>
                    </div>
                    <p class="mb-0">@lang('Already have an account?') <a href="{{ route('user.login') }}">@lang('Login')</a></p>
                </form>
            </div>
            <div class="bottom w-100 text-center">
                <p class="mb-0 sm-text text-center">
                    @include($activeTemplate . 'partials.copyright_text')
                </p>
            </div>
        </div>
    </section>

    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">@lang('You already have an account please Login ')</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm"
                        data-bs-dismiss="modal">@lang('Close')</button>
                    <a href="{{ route('user.login') }}" class="btn btn--base btn-sm">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }

        label {
            color: #f8f9fa !important;
        }
    </style>
@endpush


@if($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif

@push('script')
    <script>
        "use strict";
        (function($) {
            @if ($mobileCode)
                $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
            @endif

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            @if ($general->secure_password)
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });
            @endif

            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush
