@props(['property'])
<div class="project-single mb-0" data-aos="fade-up">
    <a href="{{ route('property', $property->slug) }}" class="recent-16">
        <div class="recent-img16 img-center" style="background-image: url({{ asset($property->image) }});"></div>
        <div class="recent-details">
            <div class="recent-title">{{ $property->title }}</div>
            <div class="recent-price">{{ number_format($property->price, 2) }} {{ $property->currency?->symbol }}</div>
            <div class="house-details">{{ $property->bedrooms }} @lang('frontend.bedrooms') <span>|</span> {{ $property->bathrooms }} @lang('frontend.bathrooms') <span>|</span> {{ $property->area }}  @lang('frontend.m2')</div>
        </div>
        <div class="view-proper">@lang('frontend.view_details')</div>
    </a>
</div>
