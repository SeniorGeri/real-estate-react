<header id="header-container" class="header head-tr">
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <div class="left-side">
                <div id="logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('frontend/images/logo-white-1.svg') }}" data-sticky-logo="{{ asset('frontend/images/logo-red.svg') }}" alt=""></a>
                </div>
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <nav id="navigation" class="style-1 head-tr">
                    <ul id="responsive">
                        <li><a href="{{ route('index') }}">@lang('frontend.home')</a></li>
                        <li><a href="{{ route('properties') }}">@lang('frontend.properties')</a></li>
                        <li><a href="{{ route('agents') }}">@lang('frontend.agents')</a></li>
                        <li><a href="{{ route('property', 'property') }}">@lang('frontend.property')</a></li>
                        <li><a href="{{ route('agent', 'agent') }}">@lang('frontend.agent')</a></li>
                    </ul>
                </nav>
                </div>
            </div>

            <div class="header-user-menu user-menu add d-none d-lg-none d-xl-flex">
                <div class="lang-wrap">
                    <div class="show-lang"><span><i class="fas fa-globe-americas"></i><strong>ENG</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                    <ul class="lang-tooltip lang-action no-list-style">
                        <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                        <li><a href="#" data-lantext="Fr">Francais</a></li>
                        <li><a href="#" data-lantext="Es">Espanol</a></li>
                        <li><a href="#" data-lantext="De">Deutsch</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</header>
<div class="clearfix"></div>