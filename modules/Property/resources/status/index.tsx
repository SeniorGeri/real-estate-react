'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { statusBreadcrumbs } from './data';
import StatusTable from './status';

export default function StatusIndex() {



    return (
        <AppLayout breadcrumbs={statusBreadcrumbs}>
            <Head title="Status" />
                <div className="flex flex-col gap-2 p-4 ">
                    <StatusTable/>
                </div>
        </AppLayout>
    );
}
