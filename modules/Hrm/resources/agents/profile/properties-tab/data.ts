import { Agent } from '@/modules/Hrm/resources/agents/data';
import type {BreadcrumbItem} from '@/types';
import { TranslatableField } from '@/types/helpers';
import {Row} from '@tanstack/react-table';

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

export type PropertyList = {
    id: number;
    image: string;
    title: TranslatableField;
    description: TranslatableField;
    user: Agent;
}


export type PropertyActionsProps = {
    property: Row<PropertyList>;
};

export type DeletePropertyProps = {
    property: PropertyList;
    isOpen: boolean;
    closeModal: () => void;
};