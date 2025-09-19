@extends('frontend::layout.master', ['class' => 'inner-pages the-search half-map-view dashboard-bd agents hp-6 hd-white'])
@section('content')
    <section class="properties-right featured portfolio blog google-map-right">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 blog-pots pr-0 fx-google-map-right">
                    <section class="headings-2 pt-2">
                        <div class="pro-wrapper">
                            <div class="detail-wrapper-body">
                                <div class="listing-title-bar">
                                    <div class="text-heading text-left">
                                        <p>
                                            <a href="index.html"></a> <span>{{ $properties->total() }} @lang('frontend.search_results')</span>
                                        </p>
                                    </div>
                                    <h3>@lang('frontend.properties')</h3>
                                </div>
                            </div>
                            <div
                                class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                                <div class="input-group border rounded input-group-lg w-auto mr-4">
                                    <label
                                        class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                                        for="inputGroupSelect01"><i
                                            class="fas fa-align-left fs-16 pr-2"></i>@lang('frontend.sort_by'):</label>
                                    <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby"
                                        data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3"
                                        id="inputGroupSelect01" name="sortby">
                                        <option selected>@lang('frontend.latest')</option>
                                        <option value="1">@lang('frontend.most_viewed')</option>
                                        <option value="2">@lang('frontend.price_low_to_high')</option>
                                        <option value="3">@lang('frontend.price_high_to_low')</option>
                                    </select>
                                </div>
                                {{-- <div class="sorting-options">
                                    <a href="properties-half-map-2.html" class="change-view-btn lde"><i
                                            class="fa fa-th-list"></i></a>
                                    <a href="#" class="change-view-btn active-view-btn"><i
                                            class="fa fa-th-large"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </section>

                    <div class="row">
                        <div class="col-12">
                            @include('frontend::components.search-form')
                        </div>
                    </div>

                    <div class="row mt-3">
                        @foreach ($properties as $property)
                            <div class="item col-xl-6 col-lg-6 col-md-6 col-12 landscapes sale">
                                @component('frontend::properties.map.card', ['property' => $property])
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('frontend::properties.map.map', ['properties' => $properties])
            </div>
            @include('frontend::components.paginate', ['paginator' => $properties])
        </div>
    </section>
@endsection
