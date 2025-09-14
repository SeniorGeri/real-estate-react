'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { agentBreadcrumbs } from './data';
import { AgentData } from './data';
import { AgentDataProvider } from './agent-data-context';
import AgentTable from './agent';

export default function AgentIndex({countries, cities, genders }: AgentData) {



    return (
        <AgentDataProvider agentData={{countries, cities, genders}}>
            <AppLayout breadcrumbs={agentBreadcrumbs}>
                <Head title="Agents" />
                    <div className="flex flex-col gap-2 p-4 ">
                        <AgentTable/>
                    </div>
            </AppLayout>
        </AgentDataProvider>
    );
}
