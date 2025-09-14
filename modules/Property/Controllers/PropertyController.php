<?php

declare(strict_types=1);

namespace Modules\Property\Controllers;

use App\Http\Requests\Main\FilterTableRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Property\Models\Property;
use Modules\Property\Requests\Property\StorePropertyRequest;
use Modules\Property\Requests\Property\UpdatePropertyRequest;
use Inertia\Inertia;
use Inertia\Response;

final class PropertyController
{

    /**
     * Return view to create cities
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Property::list/index');

    }

    /**
     * Load cities
     *
     * @param  FilterTableRequest $request
     * @return JsonResponse
     */
    public function show(FilterTableRequest $request): JsonResponse
    {
        
        $property = Property::filter($request)->paginate($request->limit);
        return response()->json(['data' => $property]);
    }

    /**
     * Return view to create cities
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Property::create/index');
    }

    /**
     * Store new City
     *
     * @param  StoreCityRequest $request
     * @return RedirectResponse
     */
    public function store(StorePropertyRequest $request): RedirectResponse
    {
        Property::create($request->validated());

        return to_route('property.type.list');
    }

    /**
     * Return view to edit cities
     *
     * @return Response
     */
    public function edit(Property $property): Response
    {
        return Inertia::render('Property::edit/index', [
            'property' => $property,
        ]);
    }
    /**
     * Update City
     *
     * @param  UpdateCityRequest $request
     * @param  City $city
     * @return RedirectResponse
     */
    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $property->fill($request->validated())
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
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();

        return to_route('property.type.list');
    }
}
