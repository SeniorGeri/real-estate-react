@extends('frontend::layout.master',['class' => 'inner-pages listing homepage-4 agents hd-white'])

@section('content')

    
<section class="team blog pt-5">
    <div class="container">
        @include('frontend::agents.list.heading')
        <div class="row">
            <div class="col-lg-12 agent-mb">
               <section class="headings-2 pt-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="font-weight-bold mb-0 mt-3">4 @lang('frontend.search_results')</p>
                                </div>
                            </div>
                        </div>
                        <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                            <div class="input-group border rounded input-group-lg w-auto mr-4">
                                <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>@lang('frontend.sort_by')</label>
                                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                    <option selected>@lang('frontend.alphabet')</option>
                                    <option value="1">@lang('frontend.rating')</option>
                                    <option value="1">@lang('frontend.number_of_property')</option>
                                </select>
                            </div>
                            <div class="sorting-options">
                                <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                                <a href="agents-listing-grid.html" class="change-view-btn lde"><i class="fa fa-th-large"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @for ($i = 0 ; $i < 6 ; $i++)
                @component('frontend::agents.list.agent-row')
                @endcomponent
            @endfor
        </div>
        @component('frontend::components.paginate')
        @endcomponent
    </div>
</section>

@endsection
