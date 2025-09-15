<?php

declare(strict_types= 1);

namespace App\Http\Controllers\Settings;

use App\Http\Requests\Settings\BioProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class BioProfileController
{
    /**
     * Show the user's profile settings page.
     */
    public function edit(): Response
    {
        return Inertia::render('settings/bio-index');
    }

    /**
     * Update the user's profile settings.
     */
    public function update(BioProfileUpdateRequest $request): RedirectResponse
    {
        User::findOrFail($request->user()->id)
        ->setTranslation('bio', $request->validated()['locale'], $request->validated()['bio'])
        ->update();

        return to_route('bio.edit');
    }
}
