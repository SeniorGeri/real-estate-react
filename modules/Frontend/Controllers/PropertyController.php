<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Modules\Property\Models\Property;

final class PropertyController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function list(): View
    {

        $properties = Property::query()
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
        ->paginate(9);
        

        return view('frontend::properties.list.index', [
            'properties' => $properties
        ]);

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function map(): View
    {

        $properties = Property::query()
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
        ->paginate(6);
        
        return view('frontend::properties.map.index', [
            'properties' => $properties
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
