<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;

final class ContactController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function index(): View
    {

        return view('frontend::contact.index');

    }
}
