<aside class="col-lg-4 col-md-12 car">
    <div class="single widget">
        <div class="widget-boxed mt-33 mt-5">
            <div class="widget-boxed-header">
                <h4>Agent Information</h4>
            </div>
            <div class="widget-boxed-body">
                <div class="sidebar-widget author-widget2">
                    <div class="author-box clearfix">
                        <img src="{{ asset('frontend/images/testimonials/ts-1.jpg') }}" alt="author-image"
                            class="author__img">
                        <h4 class="author__title">Lisa Clark</h4>
                        <p class="author__meta">Agent of Property</p>
                    </div>
                    <ul class="author__contact">
                        <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>302
                            Av Park, New York</li>
                        <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a
                                href="#">(234) 0200
                                17813</a></li>
                        <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a
                                href="#">lisa@gmail.com</a>
                        </li>
                    </ul>
                    <div class="agent-contact-form-sidebar">
                        <h4>Request Inquiry</h4>
                        <form name="contact_form" method="post" action="functions.php">
                            <input type="text" id="fname" name="full_name" placeholder="Full Name" required />
                            <input type="number" id="pnumber" name="phone_number" placeholder="Phone Number"
                                required />
                            <input type="email" id="emailid" name="email_address" placeholder="Email Address"
                                required />
                            <textarea placeholder="Message" name="message" required></textarea>
                            <input type="submit" name="sendmessage" class="multiple-send-message"
                                value="Submit Request" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-search-field-2">
            <div class="widget-boxed mt-5">
                <div class="widget-boxed-header">
                    <h4>Recent Properties</h4>
                </div>
                <div class="widget-boxed-body">
                    <div class="recent-post">
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img
                                        src="{{ asset('frontend/images/feature-properties/fp-1.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html">
                                    <h6>Family Home</h6>
                                </a>
                                <p>$230,000</p>
                            </div>
                        </div>
                        <div class="recent-main my-4">
                            <div class="recent-img">
                                <a href="blog-details.html"><img
                                        src="{{ asset('frontend/images/feature-properties/fp-2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html">
                                    <h6>Family Home</h6>
                                </a>
                                <p>$230,000</p>
                            </div>
                        </div>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img
                                        src="{{ asset('frontend/images/feature-properties/fp-3.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html">
                                    <h6>Family Home</h6>
                                </a>
                                <p>$230,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-boxed mt-5">
                <div class="widget-boxed-header mb-5">
                    <h4>Feature Properties</h4>
                </div>
                <div class="widget-boxed-body">
                    <div class="slick-lancers">
                        <div class="agents-grid mr-0">
                            <div class="listing-item compact">
                                <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ 230,000</span>
                                        <span>For Sale</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">House Luxury <i>New
                                                York</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>720 sq ft</span></li>
                                            <li>Rooms <span>6</span></li>
                                            <li>Beds <span>2</span></li>
                                            <li>Baths <span>3</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('frontend/images/feature-properties/fp-1.jpg') }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="agents-grid mr-0">
                            <div class="listing-item compact">
                                <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ 6,500</span>
                                        <span class="rent">For Rent</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">House Luxury <i>Los
                                                Angles</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>720 sq ft</span></li>
                                            <li>Rooms <span>6</span></li>
                                            <li>Beds <span>2</span></li>
                                            <li>Baths <span>3</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('frontend/images/feature-properties/fp-2.jpg') }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="agents-grid mr-0">
                            <div class="listing-item compact">
                                <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ 230,000</span>
                                        <span>For Sale</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">House Luxury <i>San
                                                Francisco</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>720 sq ft</span></li>
                                            <li>Rooms <span>6</span></li>
                                            <li>Beds <span>2</span></li>
                                            <li>Baths <span>3</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('frontend/images/feature-properties/fp-3.jpg') }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="agents-grid mr-0">
                            <div class="listing-item compact">
                                <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ 6,500</span>
                                        <span class="rent">For Rent</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">House Luxury <i>Miami
                                                FL</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>720 sq ft</span></li>
                                            <li>Rooms <span>6</span></li>
                                            <li>Beds <span>2</span></li>
                                            <li>Baths <span>3</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('frontend/images/feature-properties/fp-4.jpg') }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="agents-grid mr-0">
                            <div class="listing-item compact">
                                <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ 230,000</span>
                                        <span>For Sale</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">House Luxury <i>Chicago
                                                IL</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>720 sq ft</span></li>
                                            <li>Rooms <span>6</span></li>
                                            <li>Beds <span>2</span></li>
                                            <li>Baths <span>3</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('frontend/images/feature-properties/fp-5.jpg') }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="agents-grid mr-0">
                            <div class="listing-item compact">
                                <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ 6,500</span>
                                        <span class="rent">For Rent</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">House Luxury <i>Toronto
                                                CA</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>720 sq ft</span></li>
                                            <li>Rooms <span>6</span></li>
                                            <li>Beds <span>2</span></li>
                                            <li>Baths <span>3</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('frontend/images/feature-properties/fp-6.jpg') }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</aside>

@push('scripts')
    <script>
        $('.slick-lancers').each(function() {
            var slider = $(this);
            $(this).slick({
                infinite: true,
                dots: false,
                arrows: false,
                centerMode: true,
                centerPadding: '0'
            });

            $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                slider.slick('slickPrev');
            });
            $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                slider.slick('slickNext');
            });
        });
    </script>
@endpush
