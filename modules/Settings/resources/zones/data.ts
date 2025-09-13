import type {BreadcrumbItem} from '@/types';
import {Row} from '@tanstack/react-table';
import {route} from "ziggy-js";
import { TranslatableField } from '@/types/helpers';
import { City } from '../cities/data';

export const zoneBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Zone',
        href: route('zone.list'),
    },
];

export type Zone = {
    id: number;
    name: TranslatableField;
    city_id: number;
    city: City;
    description: string;
};

export type ZoneActionsProps = {
    zone: Row<Zone>;
};

export type DeleteZoneProps = {
    zone: Zone;
    isOpen: boolean;
    closeModal: () => void;
};

export type EditZoneProps = {
    zone: Zone;
    isOpen: boolean;
    closeModal: () => void;
};
