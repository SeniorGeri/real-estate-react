<style>
    .image {
        position: sticky;
        top: 0;
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    .image1 {
        background-image: url("image1.jpg");
        z-index: 1; 
    }

    .image2 {
        background-image: url("image2.jpg");
        z-index: 2;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .image2 {
        opacity: 1;
        /* when scrolled down */
    }
</style>
<header id="header-container" class="header head-tr">
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <div class="left-side d-flex flex-row align-items-center">
                <div id="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('logos/ACE PROPERTIES Logo 3 White.png') }}"
                            data-sticky-logo="{{ asset('logos/logo-text-vertical.png') }}" alt=""
                            style="width: 100%; max-width: 200px;">
                    </a>
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
                        <li><a href="{{ route('properties') }}">@lang('frontend.properties')</a></li>
                        <li><a href="{{ route('agents') }}">@lang('frontend.agents')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('frontend.contact')</a></li>
                        <li><a href="{{ route('faq') }}">@lang('frontend.faq')</a></li>
                        <li><a href="{{ route('about-us') }}">@lang('frontend.about')</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="header-user-menu user-menu add d-none d-lg-none d-xl-flex">
            <div class="lang-wrap">
                <div class="show-lang"><span><i class="fas fa-globe-americas"></i><strong>ENG</strong></span><i
                        class="fa fa-caret-down arrlan"></i></div>
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
