@extends('frontend::layout.master', ['class' => 'inner-pages sin-1 homepage-4 hd-white'])

@section('content')
    
    <link rel="stylesheet" href="{{ asset('frontend/css/datedropper.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/leaflet-gesture-handling.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/leaflet.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/leaflet.markercluster.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/leaflet.markercluster.default.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/timedropper.css') }}">
@push('scripts')
        <script src="{{ asset('frontend/js/inner.js') }}"></script>

        <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>

        <script src="{{ asset('frontend/js/jqueryadd-count.js') }}"></script>

        <script src="{{ asset('frontend/js/leaflet-gesture-handling.min.js') }}"></script>

        <script src="{{ asset('frontend/js/leaflet-providers.js') }}"></script>

        <script src="{{ asset('frontend/js/leaflet.js') }}"></script>

        <script src="{{ asset('frontend/js/leaflet.markercluster.js') }}"></script>

        <script src="{{ asset('frontend/js/map-single.js') }}"></script>

        <script src="{{ asset('frontend/js/popper.min.js') }}"></script>

        <script src="{{ asset('frontend/js/popup.js') }}"></script>

        <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>

        <script src="{{asset('frontend/js/datedropper.js')}}"></script>

        <script src="{{asset('frontend/js/timedropper.js')}}"></script>
    @endpush
    @include('frontend::properties.details.heading')

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="headings-2 pt-0">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h3>{{ $property->title }}</h3>
                                     
                                            <div class="mt-0">
                                                @if($property->for_sale)
                                                    <span class="category-tag">@lang('frontend.for_sale')</span>
                                                @endif
                                                @if ($property->for_rent)
                                                    <span class="category-tag">@lang('frontend.for_rent')</span>
                                                @endif
                                                <a href="#listing-location" class="listing-address">
                                                    <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{ $property->address }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single detail-wrapper mr-2">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h4>{{ number_format($property->price, 2) }}{{ $property->currency?->symbol }}</h4>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <p>{{ $property->area }} @lang('frontend.m2')</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Star Description -->
                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">@lang('frontend.description')</h5>
                               {!! $property->description !!}
                            </div>
                            <!-- End Description -->
                        </div>
                    </div>
                    <!-- Star Property Details -->
                    <div class="single homes-content details mb-30">
                        <!-- title -->
                        <h5 class="mb-4">@lang('frontend.property_details')</h5>
                        <ul class="homes-list clearfix">
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.property_id'):</span>
                                <span class="det">{{ $property->id }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.property_type'):</span>
                                <span class="det">{{ $property->propertyType?->type }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.property_status'):</span>
                                <span class="det">{{ $property->propertyStatus?->status }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.property_price'):</span>
                                <span class="det">{{ number_format($property->price, 2) }}{{ $property->currency?->symbol }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.floor'):</span>
                                <span class="det">{{ $property->floor }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.bedrooms'):</span>
                                <span class="det">{{ $property->bedrooms }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.bathrooms'):</span>
                                <span class="det">{{ $property->bathrooms }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.garages'):</span>
                                <span class="det">{{ $property->garages }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">@lang('frontend.year_built'):</span>
                                <span class="det">{{ $property->year_built }}</span>
                            </li>
                        </ul>
                        <!-- title -->
                        <h5 class="mt-5">@lang('frontend.amenities')</h5>
                        <!-- cars List -->
                        <ul class="homes-list clearfix">
                            @if ($property->elevator)
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>@lang('frontend.elevator')</span>
                                </li>
                            @endif
                       
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.internet')</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.dishwasher')</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.bedding')</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.cable_tv')</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.parking')</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.pool')</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>@lang('frontend.fridge')</span>
                            </li>
                        </ul>
                    </div>
                    @include('frontend::properties.details.video')

                </div>
                @include('frontend::properties.details.sidebar')
            </div>
            @include('frontend::properties.details.map')
           
            {{-- @include('frontend::properties.details.similar') --}}
        </div>
    </section>

    @push('scripts')
    

        <script>
            $(document).ready(function() {
                $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });
        </script>


    @endpush
@endsection
