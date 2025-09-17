<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a href="{{ asset('frontend/images/single-property/s-1.jpg') }}" class="grid image-link">
                <img src="{{ asset('frontend/images/single-property/s-1.jpg') }}" class="img-fluid" alt="#">
            </a>
        </div>
        <div class="swiper-slide">
            <a href="{{ asset('frontend/images/single-property/s-2.jpg') }}" class="grid image-link">
                <img src="{{ asset('frontend/images/single-property/s-2.jpg') }}" class="img-fluid" alt="#">
            </a>
        </div>
        <div class="swiper-slide">
            <a href="{{ asset('frontend/images/single-property/s-3.jpg') }}" class="grid image-link">
                <img src="{{ asset('frontend/images/single-property/s-3.jpg') }}" class="img-fluid" alt="#">
            </a>
        </div>
        <div class="swiper-slide">
            <a href="{{ asset('frontend/images/single-property/s-4.jpg') }}" class="grid image-link">
                <img src="{{ asset('frontend/images/single-property/s-4.jpg') }}" class="img-fluid" alt="#">
            </a>
        </div>
        <div class="swiper-slide">
            <a href="{{ asset('frontend/images/single-property/s-5.jpg') }}" class="grid image-link">
                <img src="{{ asset('frontend/images/single-property/s-5.jpg') }}" class="img-fluid" alt="#">
            </a>
        </div>
        <div class="swiper-slide">
            <a href="{{ asset('frontend/images/single-property/s-6.jpg') }}" class="grid image-link">
                <img src="{{ asset('frontend/images/single-property/s-6.jpg') }}" class="img-fluid" alt="#">
            </a>
        </div>
    </div>

    <div class="swiper-pagination swiper-pagination-white"></div>

    <div class="swiper-button-next swiper-button-white mr-3"></div>
    <div class="swiper-button-prev swiper-button-white ml-3"></div>
</div>

@push('scripts')
    <script>
        function getSlidesPerWidth() {
            if(window.innerWidth < 640) {
                return 1;
            } else if(window.innerWidth < 768) {
                return 2;
            } else if(window.innerWidth < 1300) {
                return 3;
            } else {
                return 4;
            }
        }
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: getSlidesPerWidth(),
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 3
                }
            },
            observer: true,
            observeParents: true
        });
    </script>
@endpush
