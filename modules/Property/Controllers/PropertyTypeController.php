<?php

declare(strict_types=1);

namespace Modules\Property\Controllers;

use App\Http\Requests\Main\FilterTableRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Property\Models\PropertyType;
use Modules\Property\Requests\Type\StorePropertyTypeRequest;
use Modules\Property\Requests\Type\UpdatePropertyTypeRequest;
use Inertia\Inertia;
use Inertia\Response;

final class PropertyTypeController
{

    /**
     * Return view to create cities
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Property::type/index');

    }

    /**
     * Load cities
     *
     * @param  FilterTableRequest $request
     * @return JsonResponse
     */
    public function show(FilterTableRequest $request): JsonResponse
    {
        
        $propertyType = PropertyType::filter($request)->paginate($request->limit);
        return response()->json(['data' => $propertyType]);
    }

    /**
     * Store new City
     *
     * @param  StoreCityRequest $request
     * @return RedirectResponse
     */
    public function store(StorePropertyTypeRequest $request): RedirectResponse
    {
        PropertyType::create($request->validated());

        return to_route('property.type.list');
    }

    /**
     * Update City
     *
     * @param  UpdateCityRequest $request
     * @param  City $city
     * @return RedirectResponse
     */
    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType): RedirectResponse
    {
        $propertyType->fill($request->validated())
        ->setMultipleTranslations($request->translated(), $request->locale)
        ->save();

        return to_route('property.type.list');
    }

    /**
     * Delete City
     *
     * @param  City $city
     * @return RedirectResponse
     */
    public function destroy(PropertyType $propertyType): RedirectResponse
    {
        $propertyType->delete();

        return to_route('property.type.list');
    }
}
