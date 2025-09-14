<?php

declare(strict_types=1);

namespace Modules\Hrm\Controllers\Agent;

use App\Http\Requests\Main\FilterTableRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Hrm\Models\Agent;
use Modules\Property\Models\Property;

final class AgentProfileController
{

    /**
     * Return view to create agents
     *
     * @return Response
     */
    public function index(User $agent): Response
    {
        $agent->load([
            'country:id,country',
            'city:id,city',
            'gender:id,gender',
        ]);
        // ->loadSum('transactions','amount');
        return Inertia::render('Hrm::agents/profile/index',[
            'agent' => $agent
        ]);

    }

    public function properties(FilterTableRequest $request, Agent $agent):JsonResponse
    {
        $property = Property::filter($request)
        ->whereUserId($agent->id)
        ->with(['user'])
        ->orderBy('id', 'desc')
        ->paginate($request->limit);
        return response()->json(['data' => $property]);
    }

}
