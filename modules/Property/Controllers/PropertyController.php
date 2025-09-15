<?php

declare(strict_types=1);

namespace Modules\Property\Controllers;

use App\Enums\RolesEnum;
use App\Http\Requests\Main\FilterTableRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Property\Models\Property;
use Modules\Property\Requests\Property\StorePropertyRequest;
use Modules\Property\Requests\Property\UpdatePropertyRequest;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Property\Helpers\PropertyAttributesService;
use Modules\Property\Models\PropertyStatus;
use Modules\Property\Models\PropertyType;
use Modules\Settings\Models\City;
use Modules\Settings\Models\Currency;
use Modules\Settings\Models\Zone;

final class PropertyController
{

    /**
     * Return view to create cities
     *
     * @return Response
     */
    public function index(): Response
    {
        $agents = User::role(RolesEnum::AGENT->value)->get();
        return Inertia::render('Property::list/index', [
            'agents' => $agents,
        ]);

    }

    /**
     * Load properties
     *
     * @param  FilterTableRequest $request  
     * @return JsonResponse
     */
    public function show(FilterTableRequest $request): JsonResponse
    {
        
        $property = Property::filter($request)
        ->when(!Auth::user()->hasRole(RolesEnum::ADMIN->value), function ($query) {
            $query->where('user_id', Auth::user()->id);
        })
        ->with(['user', 'propertyAttributes'])
        ->orderBy('id', 'desc')
        ->paginate($request->limit);
        return response()->json(['data' => $property]);
    }


    /**
     * Store new Property
     *
     * @param  StorePropertyRequest $request
     * @return RedirectResponse
     */
    public function store(StorePropertyRequest $request): RedirectResponse
    {
        Property::create($request->validated());

        return to_route('property.list');
    }

    /**
     * Return view to edit Property
     *
     * @return Response
     */
    public function edit(Property $property): Response
    {   

        if (!Auth::user()->hasRole(RolesEnum::ADMIN->value) && $property->user_id !== Auth::user()->id) {
            abort(403);
        }

        $propertyTypes = PropertyType::all();
        $propertyStatuses = PropertyStatus::all();
        $zones = Zone::all();
        $cities = City::all();
        $currencies = Currency::all();
        $agents = User::role(RolesEnum::AGENT->value)->get();
     
        return Inertia::render('Property::edit/index', [
            'property' => $property->load([
                'user:id,name',
                'propertyType:id,type,image',
                'propertyStatus:id,status,image',
                'zone:id,name',
                'city:id,city',
                'currency:id,currency',
                'propertyAttributes:id,property_id,attribute,value,logo,image,description',
            ]),
            'propertyTypes' => $propertyTypes,
            'propertyStatuses' => $propertyStatuses,
            'zones' => $zones,
            'cities' => $cities,
            'currencies' => $currencies,
            'agents' => $agents,
        ]);
    }
    /**
     * Update Property
     *
     * @param  UpdatePropertyRequest $request
     * @param  Property $property
     * @return RedirectResponse
     */
    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        if (!Auth::user()->role(RolesEnum::ADMIN->value) && $property->user_id !== Auth::user()->id) {
            abort(403);
        }
        DB::beginTransaction();
        
        PropertyAttributesService::storePropertyAttributes($property, $request->propertyAttributes);

        $property->fill($request->validated())
        ->setMultipleTranslations($request->translated(), config('app.locale'))
        ->save();

        DB::commit();
        return to_route('property.edit', $property);
    }

    /**
     * Delete Property
     *
     * @param  Property $property
     * @return RedirectResponse
     */
    public function destroy(Property $property): RedirectResponse
    {
        if (!Auth::user()->hasRole(RolesEnum::ADMIN->value) && $property->user_id !== Auth::user()->id) {
            abort(403);
        }
        $property->delete();

        return to_route('property.list');
    }
}
