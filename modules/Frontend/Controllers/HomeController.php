<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Modules\Property\Models\Property;
use App\Enums\RolesEnum;
use App\Models\User;

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
        
        return view('frontend::home.index', [
            'featuredProperties' => $featuredProperties,
            'agents' => $agents
        ]);

    }
}
