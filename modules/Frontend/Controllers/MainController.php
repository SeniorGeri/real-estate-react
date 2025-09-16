<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;

final class MainController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function index(): View
    {

        return view('frontend::index');

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function list(): View
    {

        return view('frontend::list');

    }

  
       /**
     * Return view to create agents
     *
     * @return View
     */
    public function agents(): View
    {

        return view('frontend::agents');

    }

           /**
     * Return view to create agents
     *
     * @return View
     */
    public function property(): View
    {

        return view('frontend::property');

    }

           /**
     * Return view to create agent
     *
     * @return View
     */
    public function agent(): View
    {

        return view('frontend::agent');

    }
}
