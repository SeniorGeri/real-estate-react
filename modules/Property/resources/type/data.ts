import type {BreadcrumbItem} from '@/types';
import {Row} from '@tanstack/react-table';
import {route} from "ziggy-js";
import { TranslatableField } from '@/types/helpers';

export const typeBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Type',
        href: route('property.type.list'),
    },
];

export type Type = {
    id: number;
    type: TranslatableField;
    description: string;
    flag?: string;
    image?: string;
};

export type TypeActionsProps = {
    type: Row<Type>;
};

export type DeleteTypeProps = {
    type: Type;
    isOpen: boolean;
    closeModal: () => void;
};

export type EditTypeProps = {
    type: Type;
    isOpen: boolean;
    closeModal: () => void;
};
