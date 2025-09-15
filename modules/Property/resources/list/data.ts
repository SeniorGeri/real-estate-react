import { Agent } from '@/modules/Hrm/resources/agents/data';
import type {BreadcrumbItem} from '@/types';
import { TranslatableField } from '@/types/helpers';
import {Row} from '@tanstack/react-table';
import {PropertyAttribute} from '../edit/props';

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
    property_attributes: PropertyAttribute[];
}


export type PropertyActionsProps = {
    property: Row<PropertyList>;
};

export type DeletePropertyProps = {
    property: PropertyList;
    isOpen: boolean;
    closeModal: () => void;
};

export type TranslatePropertyProps = {
    property: PropertyList;
    isOpen: boolean;
    closeModal: () => void;
};

