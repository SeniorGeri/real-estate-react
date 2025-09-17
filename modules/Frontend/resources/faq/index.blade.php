@extends('frontend::layout.master', ['class' => 'inner-pages ui-elements hd-white'])

@section('content')

@include('frontend::faq.heading')

<section class="faq service-details bg-white">
    <div class="container">
        <h3 class="mb-5">@lang('frontend.frequently_asked_questions')</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h5 class="uppercase mb40">@lang('frontend.questions_about_selling')</h5>
                <ul class="accordion accordion-1 one-open">
                    <li class="active">
                        <div class="title">
                            <span>@lang('frontend.what_payment_methods_are_available')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.how_can_i_get_findhouses_aid_to_live_off_campus')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.does_findhouses_share_my_information_with_others')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.what_kind_of_real_estate_advice_do_you_give')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.how_do_i_link_multiple_accounts_with_my_profile')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.what_kind_of_real_estate_advice_do_you_give')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.is_your_advice_really_be_helf_full')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.how_can_i_get_real_estate_aid_to_live_off_campus')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>@lang('frontend.does_realhome_share_my_information_with_others')</span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                </ul>
                <!--end of accordion-->
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(".accordion li").click(function() {
        $(this).closest(".accordion").hasClass("one-open") ? ($(this).closest(".accordion").find("li").removeClass("active"), $(this).addClass("active")) : $(this).toggleClass("active"), "undefined" != typeof window.mr_parallax && setTimeout(mr_parallax.windowLoad, 500)
    });

</script>
@endpush
@endsection
