@extends('frontend::layout.master', ['class' => 'inner-pages hd-white about'])

@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>@lang('frontend.about_our_company')</h1>
                <h2><a href="{{route('index')}}">@lang('frontend.home') </a> &nbsp;/&nbsp; @lang('frontend.about_us')</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION ABOUT -->
    <section class="about-us fh">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">@lang('frontend.about') <span>@lang('frontend.ace_properties')</span></h2>
                    </div>
                    <div class="pftext">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt
                            cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam
                            ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt
                            cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam
                            ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>
                    </div>
                    <div class="box bg-2">
                        <a href="about.html"
                            class="text-center button button--moema button--text-thick button--text-upper button--size-s">@lang('frontend.read_more')</a>
                        <img src="{{asset('frontend/images/signature.png')}}" class="ml-5" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="{{asset('logos/office.jpeg')}}">
                        <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=2xHQqYRcrx4">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION ABOUT -->

  @include('frontend::home.choose-us')
@endsection
