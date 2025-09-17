<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;

final class PropertyController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function list(): View
    {

        return view('frontend::properties.list.index');

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function details(): View
    {

        return view('frontend::properties.details.index');

    }
}
