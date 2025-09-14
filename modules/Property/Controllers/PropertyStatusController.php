<?php

declare(strict_types=1);

namespace Modules\Property\Controllers;

use App\Http\Requests\Main\FilterTableRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Property\Models\PropertyStatus;
use Modules\Property\Requests\Status\StorePropertyStatusRequest;
use Modules\Property\Requests\Status\UpdatePropertyStatusRequest;
use Inertia\Inertia;
use Inertia\Response;

final class PropertyStatusController
{

    /**
     * Return view to create cities
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Property::status/index');

    }

    /**
     * Load cities
     *
     * @param  FilterTableRequest $request
     * @return JsonResponse
     */
    public function show(FilterTableRequest $request): JsonResponse
    {
        
        $propertyStatus = PropertyStatus::filter($request)->orderBy('id', 'desc')->paginate($request->limit);
        return response()->json(['data' => $propertyStatus]);
    }

    /**
     * Store new City
     *
     * @param  StoreCityRequest $request
     * @return RedirectResponse
     */
    public function store(StorePropertyStatusRequest $request): RedirectResponse
    {
        PropertyStatus::create($request->validated());

        return to_route('property.status.list');
    }

    /**
     * Update City
     *
     * @param  UpdateCityRequest $request
     * @param  City $city
     * @return RedirectResponse
     */
    public function update(UpdatePropertyStatusRequest $request, PropertyStatus $propertyStatus): RedirectResponse
    {
        $propertyStatus->fill($request->validated())
        ->setMultipleTranslations($request->translated(), $request->locale)
        ->save();

        return to_route('property.status.list');
    }

    /**
     * Delete City
     *
     * @param  City $city
     * @return RedirectResponse
     */
    public function destroy(PropertyStatus $propertyStatus): RedirectResponse
    {
        $propertyStatus->delete();

        return to_route('property.status.list');
    }
}
