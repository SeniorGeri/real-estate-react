<?php

declare(strict_types=1);

namespace Modules\Property\Controllers;

use App\Enums\RolesEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Property\Models\Property;
use Modules\Property\Requests\Property\TranslatePropertyRequest;
use Modules\Property\Helpers\PropertyAttributesService;


final class TranslatePropertyController
{
    /**
     * Update Property
     *
     * @param  TranslatePropertyRequest $request
     * @param  Property $property
     * @return RedirectResponse
     */
    public function __invoke(TranslatePropertyRequest $request, Property $property): RedirectResponse
    {
        if (!Auth::user()->role(RolesEnum::ADMIN->value) && $property->user_id !== Auth::user()->id) {
            abort(403);
        }
        DB::beginTransaction();
        
        PropertyAttributesService::translatePropertyAttributes($request->input('attributes'), $request->input('locale'));

        $property->setMultipleTranslations($request->translated(), $request->locale)
        ->save();

        DB::commit();
        return to_route('property.list');
    }
}
