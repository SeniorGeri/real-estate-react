'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { listBreadcrumbs } from './data';
import PropertyTable from './property';
import {AgentsProvider} from './agents-context';
import { Agent } from '@/modules/Hrm/resources/instructors/data';

export default function StatusIndex({agents}:{agents: Agent[]}) {



    return (
        <AgentsProvider agents={agents}>
            <AppLayout breadcrumbs={listBreadcrumbs}>
                <Head title="Property List" />
                    <div className="flex flex-col gap-2 p-4 ">
                        <PropertyTable/>
                    </div>
            </AppLayout>
        </AgentsProvider>
    );
}
