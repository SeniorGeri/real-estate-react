<section class="team bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><span>@lang('frontend.meet_our') </span>@lang('frontend.agents')</h2>
            <p>@lang('frontend.agents_are_here_to_help_you')</p>
        </div>
        <div class="row team-all">
            @for ($i = 0; $i < 6; $i++)
                @component('frontend::home.agent-card')
                @endcomponent
            @endfor
        </div>
    </div>
</section>