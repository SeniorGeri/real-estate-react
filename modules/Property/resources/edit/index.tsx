'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { Suspense } from 'react';
import { useTranslation } from 'react-i18next';
import { updateBreadcrumbs } from './data';
import { DashboardHeader } from './header';
import PropertyFormSkeleton from './skeleton';
import { PropertyFormProps } from './props';
import PropertyForm from './form';


export default function Edit(props: PropertyFormProps) {
    const { t } = useTranslation('Property');
    return (
        <AppLayout breadcrumbs={updateBreadcrumbs}>
            <Head title="Property" />
            <div className="flex flex-col gap-2 p-4">
                <DashboardHeader heading={`${t('edit_property')}: ${props.property.title['en']}`} description={t('edit_property_desc')} />
                <div className="grid gap-8">
                    <Suspense fallback={<PropertyFormSkeleton />}>
                        <PropertyForm {...props} />
                    </Suspense>
                </div>
            </div>
        </AppLayout>
    );
}