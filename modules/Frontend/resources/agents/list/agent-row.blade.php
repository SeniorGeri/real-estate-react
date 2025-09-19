<div class="col-lg-12 agent-mb">
    <div class="agent agent-row shadow-hover">
        <a href="{{ route('agent', $agent->id) }}" class="agent-img">
            <div class="img-fade"></div>
            <div class="button alt agent-tag">{{ $agent->properties_count }} @lang('frontend.properties')</div>
            <img src="{{ $agent->profile_pic }}" alt=""/>
        </a>
        <div class="agent-content">
            <div class="agent-details">
                <h4><a href="{{ route('agent', $agent->id) }}">{{ $agent->name }}</a></h4>
                <p><i class="fa fa-tag icon"></i>Agent</p>
                <p><i class="fa fa-envelope icon"></i>{{ $agent->email }}</p>
                <p><i class="fa fa-phone icon"></i>{{ $agent->phone }}</p>
            </div>
            <div class="agent-text">
                <p>{!! $agent->bio !!}</p>
            </div>
            <div class="agent-footer center">
                <ul class="netsocials">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>