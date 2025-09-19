<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\Frontend\Requests\ContactFormRequest;
use Modules\Notification\Models\ContactUs;

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

    public function store(ContactFormRequest $request): RedirectResponse
    {
        ContactUs::create($request->validated());

        return back()->with('success', 'Message sent successfully');
    }
}
