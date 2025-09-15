<?php

declare(strict_types=1);

namespace Modules\Hrm\Controllers\Agent;

use App\Http\Requests\Main\FilterTableRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Hrm\Models\Agent;
use Modules\Hrm\Requests\Agents\StoreAgentRequest;
use Modules\Hrm\Requests\Agents\UpdateAgentRequest;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Settings\Models\City;
use Modules\Settings\Models\Country;
use Modules\Settings\Models\Gender;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\DB;
use Modules\Hrm\Requests\Agents\UpdateAgentPasswordRequest;

final class AgentController
{

    /**
     * Return view to create agents
     *
     * @return Response
     */
    public function index(): Response
    {
        $countries = Country::all();
        $cities = City::all();
        $genders = Gender::all();

        return Inertia::render('Hrm::agents/index',[
            'countries' => $countries,
            'cities'=> $cities,
            'genders' => $genders
        ]);

    }

    /**
     * Load agents
     *
     * @param  FilterTableRequest $request
     * @return JsonResponse
     */
    public function show(FilterTableRequest $request): JsonResponse
    {
        $agents = User::filter($request)->role(RolesEnum::AGENT->value)->orderBy('id', 'desc')
        ->paginate($request->limit);

        return response()->json(['data' => $agents]);
    }

    /**
     * Store new Agent
     *
     * @param  StoreAgentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAgentRequest $request): RedirectResponse
    {
        Agent::create($request->validated());

        return to_route('agent.list');
    }

    /**
     * Update Agent
     *
     * @param  UpdateAgentRequest $request
     * @param  Agent $agent
     * @return RedirectResponse
     */
    public function update(UpdateAgentRequest $request, Agent $agent): RedirectResponse
    {
        $agent->fill($request->validated())
        ->setMultipleTranslations($request->translated(), $request->locale)
        ->save();

        return to_route('agent.list');
    }

    /**
     * Update Agent Password
     *
     * @param  UpdateAgentPasswordRequest $request
     * @param  Agent $agent
     * @return RedirectResponse
     */
    public function password(UpdateAgentPasswordRequest $request, Agent $agent): RedirectResponse
    {
        $agent->update(['password' => $request->password]);
        DB::table('sessions')->where('user_id', $agent->id)->delete();

        return to_route('agent.list');
    }
    

    /**
     * Delete Agent
     *
     * @param  Agent $agent
     * @return RedirectResponse
     */
    public function destroy(Agent $agent): RedirectResponse
    {
        $agent->delete();

        return to_route('agent.list');
    }
}
