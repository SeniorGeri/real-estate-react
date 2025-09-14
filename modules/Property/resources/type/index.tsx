'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { typeBreadcrumbs } from './data';
import TypeTable from './type';

export default function TypeIndex() {



    return (
        <AppLayout breadcrumbs={typeBreadcrumbs}>
            <Head title="Type" />
                <div className="flex flex-col gap-2 p-4 ">
                    <TypeTable/>
                </div>
        </AppLayout>
    );
}
