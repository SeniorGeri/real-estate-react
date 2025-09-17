<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;

final class AgentController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function list(): View
    {

        return view('frontend::agents.list.index');

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function details(): View
    {

        return view('frontend::agents.details.index');

    }
}
