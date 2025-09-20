<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Http\RedirectResponse;

final class LocaleController
{

    /**
     * Return view to create agents
     *
     * @return RedirectResponse
     */
    public function __invoke(string $locale): RedirectResponse
    {
        session()->put('locale', $locale);
        return redirect()->back();

    }
}
