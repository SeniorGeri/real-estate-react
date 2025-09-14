import type {BreadcrumbItem} from '@/types';

export const listBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Property List',
        href: route('property.list'),
    },

];
