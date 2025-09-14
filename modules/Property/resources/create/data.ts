import type {BreadcrumbItem} from '@/types';

export const createBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Property List',
        href: route('property.list'),
    },
    {
        title: 'Property Create',
        href: route('property.create'),
    },
];
