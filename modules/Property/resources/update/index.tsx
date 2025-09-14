'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { updateBreadcrumbs } from './data';

export default function StatusIndex() {



    return (
        <AppLayout breadcrumbs={updateBreadcrumbs}>
            <Head title="Property update" />
                <div className="flex flex-col gap-2 p-4 ">
                </div>
        </AppLayout>
    );
}
