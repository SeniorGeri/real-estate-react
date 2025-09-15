<?php

declare(strict_types= 1);


namespace Modules\Auth\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class EmailVerificationNotificationController {
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        abort(404);

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
