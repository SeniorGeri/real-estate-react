@props([
    'filters' => [],
    'request' => null,
    'map' => false
])
<div class="banner-search-wrap">
    <form action="{{ $map ? route('properties-map') : route('properties') }}" method="GET" id="search-form">
        <div class="rld-main-search">
            <div class="row">
                <div class="rld-single-input">
                    <input type="text" placeholder="@lang('frontend.enter_keyword')" name="keyword" @if (isset($request) && $request->keyword) value="{{ $request->keyword }}" @endif>
                    <input type="hidden" name="sortby" id="sort_by_input" value="id_desc" @if (isset($request) && $request->sortby) value="{{ $request->sortby }}" @endif>
                </div>
                <div class="rld-single-select ml-22">
                    <select class="select single-select" name="type">
                        <option value="0" selected disabled>@lang('frontend.property_type')</option>
                        <option value="0"> @lang('frontend.all')</option>
                        @foreach ($filters['types'] as $type)
                            <option value="{{ $type->id }}" @if (isset($request) && $request->type == $type->id) selected @endif>{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="rld-single-select">
                    <select class="select single-select mr-0" name="zone">
                        <option value="0" selected disabled>@lang('frontend.zone')</option>

                        <option value="0">@lang('frontend.all')</option>
                        @foreach ($filters['zones'] as $zone)
                            <option value="{{ $zone->id }}" @if (isset($request) && $request->zone == $zone->id) selected @endif>{{ $zone->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dropdown-filter"><span>@lang('frontend.advanced_search')</span></div>
                <div class="px-0 mx-0">
                    <button class="btn btn-yellow" type="submit">@lang('frontend.search_now')</button>
                </div>
                <div class="explore__form-checkbox-list full-filter">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                            <!-- Form Property Status -->
                            <div class="form-group categories">
                                <select class="nice-select form-control wide" tabindex="0" name="property_status">

                                    <ul class="list">
                                        <option value="0" selected disabled>@lang('frontend.property_status') </option>
                                        <option value="0"> @lang('frontend.all')</option>
                                        @foreach ($filters['statuses'] as $status)
                                            <option class="option" value="{{ $status->id }}" @if (isset($request) && $request->property_status == $status->id) selected @endif>{{ $status->status }}</option>
                                        @endforeach
                                    </ul>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                            <div class="form-group beds">
                                <select class="nice-select form-control wide" tabindex="0" name="bedrooms"><span
                                        class="current"><i class="fa fa-bed"
                                            aria-hidden="true"></i>@lang('frontend.bedrooms')</span>
                                    <ul class="list">
                                        <option value="0" selected disabled>@lang('frontend.bedrooms') </option>
                                        <option value="0">@lang('frontend.all') </option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" @if (isset($request) && $request->bedrooms == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </ul>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                            <div class="form-group bath">
                                <select class="nice-select form-control wide" tabindex="0" name="bathrooms"><span
                                        class="current"><i class="fa fa-bath"
                                            aria-hidden="true"></i>@lang('frontend.bathrooms')</span>
                                    <ul class="list">
                                        <option value="0" selected disabled>@lang('frontend.bathrooms') <i
                                                class="fa fa-bath" aria-hidden="true"></i></option>
                                        <option value="0">@lang('frontend.all') <i class="fa fa-bath"
                                                aria-hidden="true"></i></option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" @if (isset($request) && $request->bathrooms == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </ul>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld d-none d-lg-none d-xl-flex">
                            <div class="main-search-field-2">
                                <div class="range-slider">
                                    <label>@lang('frontend.area_size')</label>
                                    <div id="area-range" data-min="{{ $filters['propertyProportions']['min_area'] }}"
                                        data-max="{{ $filters['propertyProportions']['max_area'] }}"
                                        data-unit="@lang('frontend.m2')">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <br>
                                <div class="range-slider">
                                    <label>@lang('frontend.price_range')</label>
                                    <div id="price-range"
                                        data-min="{{ $filters['propertyProportions']['min_price'] }}"
                                        data-max="{{ $filters['propertyProportions']['max_price'] }}"
                                        data-unit="ALL">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30 d-none d-lg-none d-xl-flex">
                            <div class="checkboxes one-in-row margin-bottom-10 ch-1">
                                <input id="check-2" type="checkbox" name="amenities[]">
                                <label for="check-2">Air Conditioning</label>
                                <input id="check-3" type="checkbox" name="amenities[]">
                                <label for="check-3">Swimming Pool</label>
                                <input id="check-4" type="checkbox" name="amenities[]">
                                <label for="check-4">Central Heating</label>
                                <input id="check-5" type="checkbox" name="amenities[]">
                                <label for="check-5">Laundry Room</label>
                                <input id="check-6" type="checkbox" name="amenities[]">
                                <label for="check-6">Gym</label>
                                <input id="check-7" type="checkbox" name="amenities[]">
                                <label for="check-7">Alarm</label>
                                <input id="check-8" type="checkbox" name="amenities[]">
                                <label for="check-8">Window Covering</label>
                            </div>
                            <!-- Checkboxes / End -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30 d-none d-lg-none d-xl-flex">
                            <!-- Checkboxes -->
                            <div class="checkboxes one-in-row margin-bottom-10 ch-2">
                                <input id="check-9" type="checkbox" name="amenities[]">
                                <label for="check-9">WiFi</label>
                                <input id="check-10" type="checkbox" name="amenities[]">
                                <label for="check-10">TV Cable</label>
                                <input id="check-11" type="checkbox" name="amenities[]">
                                <label for="check-11">Dryer</label>
                                <input id="check-12" type="checkbox" name="amenities[]">
                                <label for="check-12">Microwave</label>
                                <input id="check-13" type="checkbox" name="amenities[]">
                                <label for="check-13">Washer</label>
                                <input id="check-14" type="checkbox" name="amenities[]">
                                <label for="check-14">Refrigerator</label>
                                <input id="check-15" type="checkbox" name="amenities[]">
                                <label for="check-15">Outdoor Shower</label>
                            </div>
                            <!-- Checkboxes / End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        function logArea() {
            console.log();
        }

        $('#search-form').submit(() => {
            $('#search-form').append($('<input>').attr('type', 'hidden').attr('name', 'price_range').attr('value',
                $('#price-range').slider("option", "values")))
            $('#search-form').append($('<input>').attr('type', 'hidden').attr('name', 'area_range').attr('value', $(
                '#area-range').slider("option", "values")))
        });

        @if (isset($request) && $request->price_range)
            $('#price-range').slider("option", "values", [{{ $request->price_range }}])
        @endif

        @if (isset($request) && $request->area_range)
            $('#area-range').slider("option", "values", [{{ $request->area_range }}])
        @endif
    </script>
@endpush
