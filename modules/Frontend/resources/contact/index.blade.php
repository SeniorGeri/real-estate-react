@extends('frontend::layout.master', ['class' => 'inner-pages hd-white'])

@section('content')
    
    @include('frontend::contact.heading')

    <section class="contact-us">
        <div class="container">
            <div class="property-location mb-5">
                <h3>@lang('frontend.our_location')</h3>
                <div class="divider-fade"></div>
                <div id="map-contact" class="contact-map"></div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <h3 class="mb-4">@lang('frontend.contact_us')</h3>
                    <form action="{{ route('contact.store') }}" class="contact-form" method="post">
                        @csrf
                        <div id="success" class="successform">
                            <p class="alert alert-success font-weight-bold" role="alert">@lang('frontend.message_sent_successfully')</p>
                        </div>
                        <div id="error" class="errorform">
                            <p>@lang('frontend.something_went_wrong')</p>
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="name"
                                placeholder="@lang('frontend.first_name')">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="phone"
                                placeholder="@lang('frontend.phone')">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom input-full" name="email"
                                placeholder="@lang('frontend.email')">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom input-full" name="subject"
                                placeholder="@lang('frontend.subject')">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8"
                                placeholder="@lang('frontend.message')"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">@lang('frontend.submit')</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12 bgc">
                    <div class="call-info">
                        <h3>@lang('frontend.contact_details')</h3>
                        <p class="mb-5">@lang('frontend.contact_details_text')</p>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">95 South Park Ave, USA</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">+456 875 369 208</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">support@findhouses.com</p>
                                </div>
                            </li>
                            <li>
                                <div class="info cll">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <p class="in-p ti">8:00 a.m - 9:00 p.m</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
