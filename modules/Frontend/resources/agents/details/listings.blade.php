   <!-- START SIMILAR PROPERTIES -->
   <section class="similar-property featured portfolio bshd p-0 bg-white">
    <div class="container">
        <h5>@lang('frontend.listing_by') {{ $agent->name }}</h5>
        <div class="row">
            @foreach ($agent->properties as $property)
            <div class="item col-lg-6 col-md-6 col-xs-12 landscapes sale">
                <div class="project-single h-100">
                    <div class="project-inner project-head">
                        <div class="homes">
                            <!-- homes img -->
                            <a href="{{ route('property', $property->slug) }}" class="homes-img">
                                @if ($property->is_featured)
                                    <div class="homes-tag button alt featured">@lang('frontend.featured')</div>
                                @endif
                                @if ($property->status == 'for_sale')
                                    <div class="homes-tag button alt sale">@lang('frontend.for_sale')</div>
                                @endif
                                <img src="{{  $property->image }}" alt="home-1"
                                    class="img-responsive">
                            </a>
                        </div>
                        <div class="button-effect">
                            <a href="{{ route('property', $property->slug) }}" class="img-poppu btn"><i
                                    class="fa fa-photo"></i></a>
                        </div>
                    </div>
                    <!-- homes content -->
                    <div class="homes-content h-100">
                        <!-- homes address -->
                        <h3><a href="{{ route('property', $property->slug) }}">{{ $property->title }}</a></h3>
                        <p class="homes-address mb-3">
                            <a href="{{ route('property', $property->slug) }}">
                                <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
                            </a>
                        </p>
                        <!-- homes List -->
                        <ul class="homes-list clearfix">
                            <li>
                                <span>{{ $property->bedrooms }} @lang('frontend.bedrooms')</span>
                            </li>
                            <li>
                                <span>{{ $property->bathrooms }} @lang('frontend.bathrooms')</span>
                            </li>
                            <li>
                                <span>{{ $property->area }} @lang('frontend.m2')</span>
                            </li>
                            <li>
                                <span>{{ $property->garages }} @lang('frontend.garages')</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>