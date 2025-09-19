@extends('frontend::layout.master',['class' => 'inner-pages agents hp-6 full hd-white'])

@section('content')

    
<section class="properties-list featured portfolio blog ho-17">
    <div class="container">
        @include('frontend::properties.list.heading')

        <div class="col-12 px-0 parallax-searchs">
           @include('frontend::components.search-form', ['filters' => $filters, 'request' => $request ?? null])
        </div>
        <section class="headings-2 pt-0">
            <div class="pro-wrapper">
                <div class="detail-wrapper-body">
                    <div class="listing-title-bar">
                        <div class="text-heading text-left">
                            <p class="font-weight-bold mb-0 mt-3">{{ $properties->total() }} @lang('frontend.search_results')</p>
                        </div>
                    </div>
                </div>
                <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center">
                    <div class="input-group border rounded input-group-lg w-auto mr-4">
                        <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>@lang('frontend.sort_by')</label>
                        <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                            <option selected>@lang('frontend.newest')</option>
                            {{-- <option value="1">@lang('frontend.most_viewed')</option> --}}
                            <option value="price_asc" onclick="window.location = '?sortby=price_asc'" @if (isset($request) && $request->sortby == 'price_asc') selected @endif> @lang('frontend.price_low_to_high')</option>
                            <option value="price_desc" onclick="window.location = '?sortby=price_desc'" @if (isset($request) && $request->sortby == 'price_desc') selected @endif> @lang('frontend.price_high_to_low')</option>
                        </select>
                    </div>
                    <div class="sorting-options">
                        <a href="properties-full-list-1.html" class="change-view-btn lde"><i class="fa fa-th-list"></i></a>
                        <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <div class="row portfolio-items">
            @foreach ($properties as $property)
            <div class="item col-lg-4 col-md-6 col-xs-12">
                @component('frontend::components.property-card', ['property' => $property])
                
                @endcomponent
            </div>
            @endforeach
        </div>
        @component('frontend::components.paginate', ['paginator' => $properties])
        
        @endcomponent
    </div>
</section>

@push('scripts')
    <script>
        $('#inputGroupSelect01').on('change', function() {
            $('#sort_by_input').val($(this).val());
            $('#search-form').submit();
        });
    </script>
@endpush
@endsection