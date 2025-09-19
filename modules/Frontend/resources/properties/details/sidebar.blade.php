<aside class="col-lg-4 col-md-12 car">
    <div class="single widget">
        @if ($property->user)
            <div class="widget-boxed mt-33 mt-5">
                <div class="widget-boxed-header">
                    <h4>@lang('frontend.agent_information')</h4>
                </div>
                <div class="widget-boxed-body">
                    <div class="sidebar-widget author-widget2">
                        <div class="author-box clearfix">
                            <img src="{{   $property->user?->profile_pic }}" alt="author-image" class="author__img" style="width: 100px; height: 100px; object-fit: cover;">
                            <h4 class="author__title">{{ $property->user?->name }}</h4>
                            <p class="author__meta">Agent</p>
                        </div>
                        <ul class="author__contact">
                            <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>{{ $property->user?->address }}</li>
                            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a
                                    href="#">{{ $property->user?->phone }}</a></li>
                            <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">{{ $property->user?->email }}</a>
                            </li>
                        </ul>
                        <div class="agent-contact-form-sidebar">
                            <h4>@lang('frontend.request_inquiry')</h4>
                            <form name="contact_form" method="post" action="functions.php">
                                <input type="text" id="fname" name="full_name" placeholder="@lang('frontend.full_name')"
                                    required />
                                <input type="number" id="pnumber" name="phone_number" placeholder="@lang('frontend.phone_number')"
                                    required />
                                <input type="email" id="emailid" name="email_address"
                                    placeholder="@lang('frontend.email_address')" required />
                                <textarea placeholder="@lang('frontend.message')" name="message" required></textarea>
                                <input type="submit" name="sendmessage" class="multiple-send-message"
                                    value="@lang('frontend.submit_request')" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="main-search-field-2">
            <div class="widget-boxed mt-5">
                <div class="widget-boxed-header">
                    <h4>@lang('frontend.featured_properties')</h4>
                </div>
                <div class="widget-boxed-body">
                    <div class="recent-post">
                        @foreach ($featuredProperties as $featuredProperty)
                        <div class="recent-main mt-2">
                            <div class="recent-img">
                                <a href="{{ route('property', $featuredProperty->slug) }}"><img
                                        src="{{  $featuredProperty->image }}"
                                        alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="{{ route('property', $featuredProperty->slug) }}">
                                    <h6>{{ $featuredProperty->title }}</h6>
                                </a>
                                <p>{{ number_format($featuredProperty->price,2) }} {{$featuredProperty->currency?->symbol}}</p>
                            </div>
                        </div>
                        @endforeach
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
