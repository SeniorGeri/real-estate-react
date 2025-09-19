<div class="project-single ps-1 h-100" data-aos="fade-up">
    <div class="project-inner project-head">
        <div class="project-bottom">
            <h4><a href="single-property-1.html">@lang('frontend.view_property')</a><span class="category">@lang('frontend.real_estate')</span></h4>
        </div>
        <div class="homes">
            <!-- homes img -->
            <a href="single-property-1.html" class="homes-img">
                @if ($property->is_featured)
                    <div class="homes-tag button alt featured">@lang('frontend.featured')</div>
                @endif
                @if ($property->for_rent || $property->for_sale)
                    <div class="homes-tag button alt sale h-auto">
                        @if ($property->for_rent && $property->for_sale)
                            @lang('frontend.for_rent'),  @lang('frontend.for_sale')
                        @elseif ($property->for_rent)
                            @lang('frontend.for_rent')
                        @elseif ($property->for_sale)
                            @lang('frontend.for_sale')
                        @endif
                    </div>
                @endif
                @if($property->propertyType)
                    <div class="homes-price">{{ $property->propertyType?->type }}</div>
                @endif
                <img src="{{ $property->image }}" alt="home-1" class="img-responsive">
            </a>
        </div>
        <div class="button-effect">
            {{-- <a href="{{ route('property', $property->slug) }}" class="btn"><i class="fa fa-link"></i></a> --}}
            {{-- <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a> --}}
            <a href="{{ route('property', $property->slug) }}" class="img-poppu btn"><i class="fa fa-photo"></i></a>
        </div>
    </div>
    <!-- homes content -->
    <div class="homes-content h-100">
        <!-- homes address -->
        <h3><a href="single-property-1.html">{{ $property->title }}</a></h3>
        <p class="homes-address mb-3 d-flex align-items-center">
            <a href="single-property-1.html">
                <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
            </a>

            <h3 class="title mt-3">
                <a href="single-property-1.html">{{ number_format($property->price, 2) }} {{ $property->currency?->symbol }}</a>
                </h3>
        </p>
        <!-- homes List -->
        <ul class="homes-list clearfix pb-3">
            <li class="the-icons">
                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                <span>{{ $property->bedrooms }} @lang('frontend.bedrooms')</span>
            </li>
            <li class="the-icons">
                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                <span>{{ $property->bathrooms }} @lang('frontend.bathrooms')</span>
            </li>
            <li class="the-icons">
                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                <span>{{ $property->area }} @lang('frontend.m2')</span>
            </li>
            <li class="the-icons">
                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                <span>{{ $property->garages }} @lang('frontend.garages')</span>
            </li>
        </ul>
        <div class="footer">
            <a href="{{ route('agent', $property->user->id) }}">
                <i class="fa fa-user"></i> {{ $property->user->name }}
            </a>
            <span>
<i class="fa fa-calendar"></i> {{ $property->created_at->diffForHumans() }}
</span>
        </div>
    </div>
</div>