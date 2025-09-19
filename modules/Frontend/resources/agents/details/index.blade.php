@extends('frontend::layout.master', ['class' => 'inner-pages agents homepage-4 agents hd-white', 'lancer' => true])

@section('content')
    <section class="blog blog-section portfolio single-proper details mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                         @include('frontend::agents.details.headings')
                            <div class="news-item news-item-sm">
                                <a href="agent-details.html" class="news-img-link">
                                    <div class="news-item-img homes">
                                        <div class="homes-tag button alt featured">{{ $agent->properties_count }} @lang('frontend.listings')</div>
                                        <img class="resp-img" src="{{ $agent->profile_pic }}" alt="{{ $agent->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="agent-details.html">
                                        <h3>{{ $agent->name }}</h3>
                                    </a>
                                    <div class="the-agents">
                                        <ul class="the-agents-details">
                                            <li><a href="#">Office: (234) 0200 17813</a></li>
                                            <li><a href="#">@lang('frontend.phone'): {{ $agent->phone }}</a></li>
                                            <li><a href="#">Fax: 809 123 0951</a></li>
                                            <li><a href="#">@lang('frontend.email'): {{ $agent->email }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-pots py-0">
                        <div class="blog-info details mb-30">
                            <h5 class="mb-4">@lang('frontend.description')</h5>
                          {!! $agent->bio !!}
                        </div>
                        @include('frontend::agents.details.listings')
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    @include('frontend::agents.details.sidebar')
                </aside>
            </div>
        </div>
    </section>

    
@endsection
