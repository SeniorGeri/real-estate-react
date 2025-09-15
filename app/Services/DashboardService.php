<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Hrm\Models\Agent;
use Modules\Property\Models\Property;

class DashboardService
{       
    public function getAdminView() : Response
    {
        $agents = Agent::select([DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN active = 1 THEN 1 ELSE 0 END) as total_active')])->first();
        $properties = Property::select([DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as total_active')])->first();

        return Inertia::render('dashboards/admin', [
            'agents' => $agents,
            'properties' => $properties,
        ]);
    }

    public function getAgentView($user) : Response
    {
        $properties = Property::select([DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as total_active')])
        ->where('user_id', $user->id)
        ->first();

        return Inertia::render('dashboards/agent', [
            'user' => $user,
            'properties' => $properties,
        ]);
    }

    public function getEmptyView() : Response
    {

        return Inertia::render('dashboard');
    }
}
