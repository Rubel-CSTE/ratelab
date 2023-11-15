<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="{{ route('home') }}">
                    <img src="{{getImage(getFilePath('logoIcon') .'/logo.png')}}"  alt="{{ __($general->site_name) }}">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ms-auto">
                        <li class="{{ menuActive('home') }}"><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li class="{{ menuActive('company.*') }}"><a
                                href="{{ route('company.all') }}">@lang('Companies')</a></li>
                        <li class="{{ menuActive('blog') }}"><a href="{{ route('blog') }}">@lang('Blog')</a></li>
                        @if (@$pages)
                            @foreach ($pages as $k => $data)
                                <li>
                                    <a class="{{ menuActive('pages', [$data->slug]) }}" href="{{ route('pages', [$data->slug]) }}">{{ __($data->name) }}</a>
                                </li>
                            @endforeach
                        @endif
                        @guest
                            <li class="{{ menuActive('contact') }}">
                                <a href="{{ route('contact') }}">@lang('Contact')</a>
                            </li>
                        @endguest
                        @auth
                            <li class="menu_has_children {{ menuActive('user.company.*') }} ">
                                <a href="javascript:void(0)">@lang('My Company')</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('user.company.index') }}">@lang('Company List')</a></li>
                                    <li><a href="{{ route('user.company.create') }}">@lang('Add Company')</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu_has_children">
                                <a href="javascript:void(0)"> {{ auth()->user()->username }}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('user.profile.setting') }}">@lang('My Profile')</a></li>
                                    <li><a href="{{ route('user.change.password') }}">@lang('Change Password')</a></li>
                                    <li><a href="{{ route('ticket.index') }}">@lang('My Support Tickets')</a></li>
                                    <li><a href="{{ route('ticket.open') }}">@lang('Open New Ticket')</a></li>
                                    <li><a href="{{ route('user.logout') }}">@lang('Logout')</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                    <div class="nav-right btn--group">
                        @if ($general->language)
                        <select class="langSel d-flex align-items-center mx-2">
                            @foreach ($language as $item)
                            <option value="{{ $item->code }}" @if (session('lang') == $item->code) selected @endif>
                                {{ __($item->name) }}
                            </option>
                            @endforeach
                        </select>
                        @endif
                        
                        @guest
                            <a href="{{ route('user.login') }}"
                                class="btn btn-md btn--base d-flex align-items-center mx-2">
                                <i class="la la-sign-in-alt fs--18px me-2"></i> @lang('Login')
                            </a>
                        @endguest
                        @auth
                            <a href="{{ route('user.home') }}"
                                class="btn btn-md btn--base d-flex align-items-center mx-2 mb-sm-2">
                                <i class="la la-user fs--18px me-2"></i> @lang('Dashboard')
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
