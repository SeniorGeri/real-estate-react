<?php

namespace Modules\Frontend\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Modules\Settings\Models\Language;

class LanguageSwitcher extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $languages = Cache::remember('languages',600, function () {
            return Language::query()->select('language', 'language_code', 'flag')->get();
        });
        return view('frontend::components.language-switcher', ['languages' => $languages]);
    }
}
