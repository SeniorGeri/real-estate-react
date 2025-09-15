import { type BreadcrumbItem} from '@/types';
import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import Bio from './bio';

export default function Index() {

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Bio settings',
            href: '/settings/bio',
        },
    ];

    return (
        
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Bio settings" />
            <Bio/>
        </AppLayout>
    );
}
