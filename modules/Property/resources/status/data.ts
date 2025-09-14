import type {BreadcrumbItem} from '@/types';
import {Row} from '@tanstack/react-table';
import {route} from "ziggy-js";
import { TranslatableField } from '@/types/helpers';

export const statusBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Status',
        href: route('property.status.list'),
    },
];

export type Status = {
    id: number;
    status: TranslatableField;
    description: string;
    flag?: string;
    image?: string;
};

export type StatusActionsProps = {
    status: Row<Status>;
};

export type DeleteStatusProps = {
    status: Status;
    isOpen: boolean;
    closeModal: () => void;
};

export type EditStatusProps = {
    status: Status;
    isOpen: boolean;
    closeModal: () => void;
};
