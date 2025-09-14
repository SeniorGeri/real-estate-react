<?php

declare(strict_types=1);

namespace Modules\Hrm\Controllers\Agent;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Hrm\Models\Agent;

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
            'transactions',
            'courses.course',
            'activeCourses.courseAgent',
            'activeCourses.student',
            'activeCourses.status',
            'liquidations'
        ]);
        // ->loadSum('transactions','amount');
        return Inertia::render('Hrm::agents/profile/index',[
            'agent' => $agent
        ]);

    }

}
