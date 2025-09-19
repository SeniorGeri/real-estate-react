<?php

declare(strict_types=1);

namespace Modules\Frontend\Controllers;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Modules\Property\Models\Property;

final class AgentController
{

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function list(): View
    {
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
        ->paginate(6);


        return view('frontend::agents.list.index', [
            'agents' => $agents
        ]);

    }

    /**
     * Return view to create agents
     *
     * @return View
     */
    public function details(int $id): View
    {   

        $agent = User::role(RolesEnum::AGENT->value)
        ->whereActive(true)
        ->with([
            'country:id,name,flag',
            'city:id,name',
            'gender:id,name',
            'properties.currency'
        ])
        ->withCount('properties')
        ->findOrFail($id);

        $featuredProperties = Cache::remember('featured_properties', 3600, function () {
            return Property::where('is_featured', true)
            ->with(['currency:id,symbol'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
        });

        return view('frontend::agents.details.index', [
            'agent' => $agent,
            'featuredProperties' => $featuredProperties
        ]);

    }
}
