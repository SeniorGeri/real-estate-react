    <header id="header-container">
            <div id="header">
                <div class="container container-header">
                    <div class="left-side d-flex flex-row align-items-center">
                        <div id="logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('logos/logo-text-vertical.png') }}" alt="" style="width: 100%; max-width: 200px;"></a>
                        </div>
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li><a href="{{ route('properties') }}">@lang('frontend.properties')</a></li>
                                <li><a href="{{ route('agents') }}">@lang('frontend.agents')</a></li>
                                <li><a href="{{ route('contact') }}">@lang('frontend.contact')</a></li>
                                <li><a href="{{ route('faq') }}">@lang('frontend.faq')</a></li>
                                <li><a href="{{ route('about-us') }}">@lang('frontend.about')</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-user-menu user-menu add d-none d-lg-none d-xl-flex">
                        <x-language-switcher />

                    </div>
                </div>
            </div>
        </header>