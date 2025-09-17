@extends('frontend::layout.master', ['class' => 'inner-pages agents homepage-4 agents hd-white', 'lancer' => true])

@section('content')
    <section class="blog blog-section portfolio single-proper details mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                         @include('frontend::agents.details.headings')
                            <div class="news-item news-item-sm">
                                <a href="agent-details.html" class="news-img-link">
                                    <div class="news-item-img homes">
                                        <div class="homes-tag button alt featured">4 @lang('frontend.listings')</div>
                                        <img class="resp-img" src="{{ asset('frontend/images/team/a-1.png') }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="agent-details.html">
                                        <h3>Carls Jhons</h3>
                                    </a>
                                    <div class="the-agents">
                                        <ul class="the-agents-details">
                                            <li><a href="#">Office: (234) 0200 17813</a></li>
                                            <li><a href="#">Mobile: (657) 9854 12095</a></li>
                                            <li><a href="#">Fax: 809 123 0951</a></li>
                                            <li><a href="#">Email: info@agent.com</a></li>
                                        </ul>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="properties-full-grid-2.html" class="news-link">@lang('frontend.view_my_listings')</a>
                                        <div class="admin">
                                            <p>Company Name</p>
                                            <img src="{{ asset('frontend/images/partners/1.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-pots py-0">
                        <div class="blog-info details mb-30">
                            <h5 class="mb-4">@lang('frontend.description')</h5>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae
                                consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas!
                                Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Cum rerum beatae consequatur, totam.</p>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae
                                consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas!
                                Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Cum rerum beatae consequatur, totam.</p>
                        </div>
                        <!-- START SIMILAR PROPERTIES -->
                        <section class="similar-property featured portfolio bshd p-0 bg-white">
                            <div class="container">
                                <h5>@lang('frontend.listing_by') Carls Jhons</h5>
                                <div class="row">
                                    <div class="item col-lg-6 col-md-6 col-xs-12 landscapes sale">
                                        <div class="project-single">
                                            <div class="project-inner project-head">
                                                <div class="homes">
                                                    <!-- homes img -->
                                                    <a href="single-property-1.html" class="homes-img">
                                                        <div class="homes-tag button alt featured">@lang('frontend.featured')</div>
                                                        <div class="homes-tag button alt sale">@lang('frontend.for_sale')</div>
                                                        <div class="homes-price">$9,000</div>
                                                        <img src="{{ asset('frontend/images/blog/b-11.jpg') }}" alt="home-1"
                                                            class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="button-effect">
                                                    <a href="single-property-1.html" class="btn"><i
                                                            class="fa fa-link"></i></a>
                                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                        class="btn popup-video popup-youtube"><i
                                                            class="fas fa-video"></i></a>
                                                    <a href="single-property-2.html" class="img-poppu btn"><i
                                                            class="fa fa-photo"></i></a>
                                                </div>
                                            </div>
                                            <!-- homes content -->
                                            <div class="homes-content">
                                                <!-- homes address -->
                                                <h3><a href="single-property-1.html">Luxury House</a></h3>
                                                <p class="homes-address mb-3">
                                                    <a href="single-property-1.html">
                                                        <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park,
                                                            NYC</span>
                                                    </a>
                                                </p>
                                                <!-- homes List -->
                                                <ul class="homes-list clearfix">
                                                    <li>
                                                        <span>6 Beds</span>
                                                    </li>
                                                    <li>
                                                        <span>3 Baths</span>
                                                    </li>
                                                    <li>
                                                        <span>720 sq ft</span>
                                                    </li>
                                                    <li>
                                                        <span>2 Garages</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-lg-6 col-md-6 col-xs-12 people rent">
                                        <div class="project-single">
                                            <div class="project-inner project-head">
                                                <div class="homes">
                                                    <!-- homes img -->
                                                    <a href="single-property-1.html" class="homes-img">
                                                        <div class="homes-tag button sale rent">For Rent</div>
                                                        <div class="homes-price">$3,000</div>
                                                        <img src="{{ asset('frontend/images/blog/b-12.jpg') }}" alt="home-1"
                                                            class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="button-effect">
                                                    <a href="single-property-1.html" class="btn"><i
                                                            class="fa fa-link"></i></a>
                                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                        class="btn popup-video popup-youtube"><i
                                                            class="fas fa-video"></i></a>
                                                    <a href="single-property-2.html" class="img-poppu btn"><i
                                                            class="fa fa-photo"></i></a>
                                                </div>
                                            </div>
                                            <!-- homes content -->
                                            <div class="homes-content">
                                                <!-- homes address -->
                                                <h3><a href="single-property-1.html">Luxury House</a></h3>
                                                <p class="homes-address mb-3">
                                                    <a href="single-property-1.html">
                                                        <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park,
                                                            NYC</span>
                                                    </a>
                                                </p>
                                                <!-- homes List -->
                                                <ul class="homes-list clearfix">
                                                    <li>
                                                        <span>6 Beds</span>
                                                    </li>
                                                    <li>
                                                        <span>3 Baths</span>
                                                    </li>
                                                    <li>
                                                        <span>720 sq ft</span>
                                                    </li>
                                                    <li>
                                                        <span>2 Garages</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item col-lg-6 col-md-6 col-xs-12 people sale no-pb">
                                        <div class="project-single no-mb">
                                            <div class="project-inner project-head">
                                                <div class="homes">
                                                    <!-- homes img -->
                                                    <a href="single-property-1.html" class="homes-img">
                                                        <div class="homes-tag button alt sale">For Sale</div>
                                                        <div class="homes-price">$9,000</div>
                                                        <img src="{{ asset('frontend/images/feature-properties/fp-11.jpg') }}" alt="home-1"
                                                            class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="button-effect">
                                                    <a href="single-property-1.html" class="btn"><i
                                                            class="fa fa-link"></i></a>
                                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                        class="btn popup-video popup-youtube"><i
                                                            class="fas fa-video"></i></a>
                                                    <a href="single-property-2.html" class="img-poppu btn"><i
                                                            class="fa fa-photo"></i></a>
                                                </div>
                                            </div>
                                            <!-- homes content -->
                                            <div class="homes-content">
                                                <!-- homes address -->
                                                <h3><a href="single-property-1.html">Luxury House</a></h3>
                                                <p class="homes-address mb-3">
                                                    <a href="single-property-1.html">
                                                        <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park,
                                                            NYC</span>
                                                    </a>
                                                </p>
                                                <!-- homes List -->
                                                <ul class="homes-list clearfix">
                                                    <li>
                                                        <span>6 Beds</span>
                                                    </li>
                                                    <li>
                                                        <span>3 Baths</span>
                                                    </li>
                                                    <li>
                                                        <span>720 sq ft</span>
                                                    </li>
                                                    <li>
                                                        <span>2 Garages</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-lg-6 col-md-6 it2 col-xs-12 web rent no-pb x2">
                                        <div class="project-single no-mb last">
                                            <div class="project-inner project-head">
                                                <div class="homes">
                                                    <!-- homes img -->
                                                    <a href="single-property-1.html" class="homes-img">
                                                        <div class="homes-tag button alt featured">Featured</div>
                                                        <div class="homes-tag button sale rent">For Rent</div>
                                                        <div class="homes-price">$3,000</div>
                                                        <img src="{{ asset('frontend/images/feature-properties/fp-12.jpg') }}" alt="home-1"
                                                            class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="button-effect">
                                                    <a href="single-property-1.html" class="btn"><i
                                                            class="fa fa-link"></i></a>
                                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                        class="btn popup-video popup-youtube"><i
                                                            class="fas fa-video"></i></a>
                                                    <a href="single-property-2.html" class="img-poppu btn"><i
                                                            class="fa fa-photo"></i></a>
                                                </div>
                                            </div>
                                            <!-- homes content -->
                                            <div class="homes-content">
                                                <!-- homes address -->
                                                <h3><a href="single-property-1.html">Luxury House</a></h3>
                                                <p class="homes-address mb-3">
                                                    <a href="single-property-1.html">
                                                        <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park,
                                                            NYC</span>
                                                    </a>
                                                </p>
                                                <!-- homes List -->
                                                <ul class="homes-list clearfix">
                                                    <li>
                                                        <span>6 Beds</span>
                                                    </li>
                                                    <li>
                                                        <span>3 Baths</span>
                                                    </li>
                                                    <li>
                                                        <span>720 sq ft</span>
                                                    </li>
                                                    <li>
                                                        <span>2 Garages</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    @include('frontend::agents.details.sidebar')
                </aside>
            </div>
        </div>
    </section>

    
@endsection
