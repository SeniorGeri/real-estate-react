<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Property\Models\Property;
use Modules\Frontend\Requests\PropertyFilterRequest;
use Modules\Property\Models\PropertyAttribute;
use Modules\Property\Models\PropertyStatus;
use Modules\Property\Models\PropertyType;
use Modules\Settings\Models\City;
use Modules\Settings\Models\Zone;

final class PropertyController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function list(PropertyFilterRequest $request): View
    {
        $properties = Property::query()
        ->filter($request)
        ->with([
            'propertyType:id,type,image',
            'propertyStatus:id,status,image',
            'propertyAttributes:attribute_id,value,logo,image,description',
            'zone:id,name',
            'city:id,city,country_id',
            'city.country:id,country',
            'user',
            'currency:id,symbol'
        ])
        ->paginate(2)
        ->appends($request->validated());

        
        $filters = Cache::remember('property_filters', 3600, function () {
            return [
                'types' => PropertyType::all(),
                'statuses' => PropertyStatus::all(),
                'attributes' => PropertyAttribute::all(),
                'zones' => Zone::all(),
                'cities' => City::all(),
                'propertyProportions' => Property::query()->whereIsActive(true)->select([
                    DB::raw('MAX(price) as max_price'),
                    DB::raw('MIN(price) as min_price'),
                    DB::raw('MAX(area) as max_area'),
                    DB::raw('MIN(area) as min_area')
                ])->first(), 
            ];
        });
        
        return view('frontend::properties.list.index', [
            'properties' => $properties,
            'filters' => $filters,
            'request' => $request
        ]);

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function map(PropertyFilterRequest $request): View
    {
        $properties = Property::query()
        ->filter($request)
        ->with([
            'propertyType:id,type,image',
            'propertyStatus:id,status,image',
            'propertyAttributes:attribute_id,value,logo,image,description',
            'zone:id,name',
            'city:id,city,country_id',
            'city.country:id,country',
            'user',
            'currency:id,symbol'
        ])
        ->paginate(1);
        
        $filters = Cache::remember('property_filters', 3600, function () {
            return [
                'types' => PropertyType::all(),
                'statuses' => PropertyStatus::all(),
                'attributes' => PropertyAttribute::all(),
                'zones' => Zone::all(),
                'cities' => City::all(),
                'propertyProportions' => Property::query()->whereIsActive(true)->select([
                    DB::raw('MAX(price) as max_price'),
                    DB::raw('MIN(price) as min_price'),
                    DB::raw('MAX(area) as max_area'),
                    DB::raw('MIN(area) as min_area')
                ])->first(), 
            ];
        });
        
        
        return view('frontend::properties.map.index', [
            'properties' => $properties,
            'filters' => $filters,
            'request' => $request
        ]);

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function details(string $slug): View
    {
        $property = Property::query()
        ->whereIsActive(true)
        ->with([
            'propertyType:id,type,image',
            'propertyStatus:id,status,image',
            'propertyAttributes:attribute_id,value,logo,image,description',
            'zone:id,name',
            'city:id,city,country_id',
            'city.country:id,country',
            'user',
            'currency:id,symbol'
        ])
        ->orderBy('id', 'desc')
        ->whereSlug($slug)
        ->firstOrFail();
        
        
        $featuredProperties = Cache::remember('featured_properties', 3600, function () {
            return Property::where('is_featured', true)
            ->with(['currency:id,symbol'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
        });

        $similarProperties =  Property::where('is_featured', true)
            ->with(['currency:id,symbol'])
            ->wherePropertyTypeId($property->property_type_id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
        
        return view('frontend::properties.details.index', [
            'property' => $property,
            'featuredProperties' => $featuredProperties,
            'similarProperties' => $similarProperties
        ]);

    }
}
