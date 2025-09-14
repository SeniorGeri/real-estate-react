'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { listBreadcrumbs } from './data';
import PropertyTable from './property';

export default function StatusIndex() {



    return (
        <AppLayout breadcrumbs={listBreadcrumbs}>
            <Head title="Property List" />
                <div className="flex flex-col gap-2 p-4 ">
                    <PropertyTable/>
                </div>
        </AppLayout>
    );
}
