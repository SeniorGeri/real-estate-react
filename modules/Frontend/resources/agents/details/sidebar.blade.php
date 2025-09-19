<div class="single widget">

    <div class="sidebar">
        <div class="widget-boxed mt-33 mt-5">
            <div class="sidebar-widget author-widget2">
                <div class="agent-contact-form-sidebar border-0 pt-0">
                    <h4>@lang('frontend.contact') {{ $agent->name }}</h4>
                        <form name="contact_form"  method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $agent->id }}">
                        <input type="text" id="fname" name="name" placeholder="@lang('frontend.full_name')" required />
                        <input type="text" id="pnumber" name="phone" placeholder="@lang('frontend.phone_number')" required />
                        <input type="email" id="emailid" name="email" placeholder="@lang('frontend.email_address')"required />
                        <input type="text" id="subject" name="subject" placeholder="@lang('frontend.subject')"required />
                        <textarea placeholder="@lang('frontend.message')" name="message" required></textarea>
                        <input type="submit"  class="multiple-send-message" value="@lang('frontend.submit_request')" />
                    </form>
                </div>
            </div>
        </div>
        <div class="main-search-field-2">
            {{-- <div class="widget-boxed mt-5">
                <div class="widget-boxed-header">
                    <h4>@lang('frontend.recent_properties')</h4>
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
                                    <h6>@lang('frontend.family_home')</h6>
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
            </div> --}}
            <div class="widget-boxed mt-5">
                <div class="widget-boxed-header mb-5">
                    <h4>@lang('frontend.featured_properties')</h4>
                </div>
                <div class="widget-boxed-body">
                    <div class="slick-lancers">
                        @foreach ($featuredProperties as $property)
                            <div class="agents-grid mr-0">
                                <div class="listing-item compact">
                                    <a href="properties-details.html" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">{{ $property->price }} {{$property->currency?->symbol}}</span>
                                        @if($property->for_sale)
                                            <span>@lang('frontend.for_sale')</span>
                                        @endif
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">{{ $property->title }} <i>{{ $property->city }}</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>@lang('frontend.area') <span>{{ $property->area }} @lang('frontend.m2')</span></li>
                                            <li>@lang('frontend.bedrooms') <span>{{ $property->bedrooms }}</span></li>
                                            <li>@lang('frontend.bathrooms') <span>{{ $property->bathrooms }}</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{  $property->image }}" alt="{{ $property->title }}">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
