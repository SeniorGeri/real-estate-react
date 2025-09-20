{{-- <div class="lang-wrap">
    <div class="show-lang"><span><i class="fas fa-globe-americas"></i><strong style="text-transform: uppercase">{{ App::getLocale() }}</strong></span><i
            class="fa fa-caret-down arrlan"></i></div>
    <ul class="lang-tooltip lang-action no-list-style">
        @foreach ($languages as $language)
            <li><a href="#" class="current-lan" data-lantext="{{ $language->language_code }}">{{ $language->language }}</a></li>
        @endforeach
    </ul>
</div> --}}

<style>
    .flag-icon {
        width: 20px;
        height: 15px;
        margin-right: 8px;
        border-radius: 2px;
    }
    .flag-img {
            width: 20px;
            height: 15px;
            margin-right: 8px;
            border-radius: 2px;
            object-fit: cover;
        }
</style>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle color-white" type="button" data-bs-toggle="dropdown">
                <img src="{{ $languages->where('language_code', App::getLocale())->first()->flag }}" alt="English" class="flag-img">
                {{ $languages->where('language_code', App::getLocale())->first()->language }}
            </button>
            <ul class="dropdown-menu">
                @foreach ($languages as $language)
                    <li><a class="dropdown-item @if ($language->language_code == App::getLocale()) active @endif" href="{{ route('set-locale', $language->language_code) }}" data-lang="en">
                        <img src="{{ $language->flag }}" alt="English" class="flag-img">
                        {{ $language->language }}
                    </a></li>
                @endforeach
            </ul>
        </div>
