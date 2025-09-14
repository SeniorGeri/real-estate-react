'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { createBreadcrumbs } from './data';

export default function StatusIndex() {



    return (
        <AppLayout breadcrumbs={createBreadcrumbs}>
            <Head title="Property delete" />
                <div className="flex flex-col gap-2 p-4 ">
                </div>
        </AppLayout>
    );
}
