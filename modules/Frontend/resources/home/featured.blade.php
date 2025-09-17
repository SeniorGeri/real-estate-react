<section class="featured portfolio rec-pro disc">
    <div class="container-fluid">
        <div class="sec-title discover">
            <h2><span>@lang('frontend.discover') </span>@lang('frontend.popular_properties')</h2>
            <p>@lang('frontend.we_provide_full_service_at_every_step')</p>
        </div>
        <div class="portfolio">
            <div class="slick-lancers">
                @for ($i = 0; $i < 10; $i++)
                    @component('frontend::home.featured-card')
                    @endcomponent
                @endfor
            </div>
        </div>
    </div>
</section>