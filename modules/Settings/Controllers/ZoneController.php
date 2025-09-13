<?php

declare(strict_types=1);

namespace Modules\Settings\Controllers;

use App\Http\Requests\Main\FilterTableRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Settings\Models\City;
use Modules\Settings\Requests\Zones\StoreZoneRequest;
use Modules\Settings\Requests\Zones\UpdateZoneRequest;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Settings\Models\Zone;

final class ZoneController
{

    /**
     * Return view to create cities
     *
     * @return Response
     */
    public function index(): Response
    {
        $cities = City::all();
        return Inertia::render('Settings::zones/index',['cities' => $cities]);

    }

    /**
     * Load cities
     *
     * @param  FilterTableRequest $request
     * @return JsonResponse
     */
    public function show(FilterTableRequest $request): JsonResponse
    {
        
        $zones = Zone::filter($request)->with(['city:id,city'])->paginate($request->limit);
        return response()->json(['data' => $zones]);
    }

    /**
     * Store new City
     *
     * @param  StoreCityRequest $request
     * @return RedirectResponse
     */
    public function store(StoreZoneRequest $request): RedirectResponse
    {
        Zone::create($request->validated());

        return to_route('zone.list');
    }

    /**
     * Update City
     *
     * @param  UpdateCityRequest $request
     * @param  City $city
     * @return RedirectResponse
     */
    public function update(UpdateZoneRequest $request, Zone $zone): RedirectResponse
    {
        $zone->fill($request->validated())
        ->setMultipleTranslations($request->translated(), $request->locale)
        ->save();

        return to_route('zone.list');
    }

    /**
     * Delete City
     *
     * @param  City $city
     * @return RedirectResponse
     */
    public function destroy(Zone $zone): RedirectResponse
    {
        $zone->delete();

        return to_route('zone.list');
    }
}
