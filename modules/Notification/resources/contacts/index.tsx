'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { contactBreadcrumbs } from './data';
import ContactTable from './contact';

export default function ContactIndex() {



    return (
            <AppLayout breadcrumbs={contactBreadcrumbs}>
                <Head title="Agents" />
                <div className="flex flex-col gap-2 p-4 ">
                  <ContactTable />
                </div>
            </AppLayout>
    );
}
