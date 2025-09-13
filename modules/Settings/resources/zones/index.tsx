'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { zoneBreadcrumbs } from './data';
import { City } from '../cities/data';
import ZoneTable from './zone';
import {CitiesProvider} from './cities-context';

export default function Index({cities}:{cities: City[]}) {


    return (
        <CitiesProvider cities={cities}>
            <AppLayout breadcrumbs={zoneBreadcrumbs}>
                <Head title="Countries" />
                    <div className="flex flex-col gap-2 p-4 ">
                        <ZoneTable/>
                    </div>
            </AppLayout>
        </CitiesProvider>
    );
}
