<div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="150">
    <div class="inner-box team-details h-75">
        {{-- <div class=" team-head"> --}}
            <a href="{{ route('agent', $agent->id) }}"><img src="{{ $agent->profile_pic }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" /></a>
            <div class="team-hover">
                <ul class="team-social">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        {{-- </div> --}}
        <div class="lower-box">
            <h3><a href="agents-listing-grid.html">{{ $agent->name }}</a></h3>
            <div class="designation">Agent</div>
        </div>
    </div>
</div>