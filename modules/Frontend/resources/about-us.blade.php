@extends('frontend::layout.master', ['class' => 'inner-pages hd-white about'])

@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>About Our Company</h1>
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; About Us</h2>
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
                        <h2 class="text-left mb-4">About <span>Find Houses</span></h2>
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
                            class="text-center button button--moema button--text-thick button--text-upper button--size-s">read
                            More</a>
                        <img src="{{asset('frontend/images/signature.png')}}" class="ml-5" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="{{asset('frontend/images/bg/bg-video.jpg')}}">
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

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white-2">
        <div class="container">
            <div class="sec-title">
                <h2><span>Why </span>Choose Us</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                    <div class="serv-flex">
                        <div class="art-1 img-13">
                            <img src="{{asset('frontend/images/icons/icon-4.svg')}}" alt="">
                            <h3>Wide Renge Of Properties</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                    <div class="serv-flex">
                        <div class="art-1 img-14">
                            <img src="{{asset('frontend/images/icons/icon-5.svg')}}" alt="">
                            <h3>Trusted by thousands</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-15">
                            <img src="{{asset('frontend/images/icons/icon-6.svg')}}" alt="">
                            <h3>Financing made easy</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END SECTION WHY CHOOSE US -->
@endsection
