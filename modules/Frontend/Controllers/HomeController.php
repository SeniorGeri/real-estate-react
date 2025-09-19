<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Modules\Property\Models\Property;
use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\Property\Models\PropertyAttribute;
use Modules\Property\Models\PropertyStatus;
use Modules\Property\Models\PropertyType;
use Modules\Settings\Models\City;
use Modules\Settings\Models\Zone;

final class HomeController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function index(): View
    {

        
        $featuredProperties = Cache::remember('featured_properties', 3600, function () {
            return Property::where('is_featured', true)
            ->with(['currency:id,symbol'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
        });

        $agents = User::role(RolesEnum::AGENT->value)
        ->whereActive(true)
        ->with([
            'country:id,name,flag',
            'city:id,name',
            'gender:id,name',
            'properties:id,title,image,slug,price'
        ])
        ->withCount('properties')
        ->orderBy('id', 'desc')
        ->take(6)
        ->get();
        
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
        
        return view('frontend::home.index', [
            'featuredProperties' => $featuredProperties,
            'agents' => $agents,
            'filters' => $filters
        ]);

    }
}
