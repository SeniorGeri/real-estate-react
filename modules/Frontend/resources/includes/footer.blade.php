  <!-- START FOOTER -->
  <footer class="first-footer rec-pro">
    <div class="top-footer py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="netabout">
                        <a href="{{ route('index') }}" class="logo">
                            <img src="{{ asset('frontend/images/logo-footer.svg') }}" alt="netcom">
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contactus">
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">95 South Park Avenue, USA</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">+456 875 369 208</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">support@findhouses.com</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="navigation">
                        <h3>@lang('frontend.navigation')</h3>
                        <div class="nav-footer">
                            <ul>
                                <li><a href="{{ route('index') }}">@lang('frontend.home')</a></li>
                                <li><a href="{{ route('properties') }}">@lang('frontend.properties')</a></li>
                                <li  class="no-mgb"><a href="{{ route('agents') }}">@lang('frontend.agents')</a></li>
                            </ul>
                            <ul class="nav-right">
                                <li><a href="{{ route('property', 'property') }}">@lang('frontend.property')</a></li>
                                <li class="no-mgb"><a href="{{ route('agent', 'agent') }}">@lang('frontend.agent')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer rec-pro">
        <div class="container-fluid sd-f">
            <p>2021 © Copyright - All Rights Reserved.</p>
            <ul class="netsocials">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</footer>