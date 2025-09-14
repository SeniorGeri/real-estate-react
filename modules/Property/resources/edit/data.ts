import type {BreadcrumbItem} from '@/types';

export const updateBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Property List',
        href: route('property.list'),
    }

];
