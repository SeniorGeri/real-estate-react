import type {BreadcrumbItem} from '@/types';
import {Row} from '@tanstack/react-table';
import {route} from "ziggy-js";
import { Country } from '@/modules/Settings/resources/countries/data';
import { City } from '@/modules/Settings/resources/cities/data';
import { Gender } from '@/modules/Settings/resources/genders/data';

export const agentBreadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Agents',
        href: route('agent.list'),
    },
];

export type AgentData = {
    countries: Country[];
    cities: City[];
    genders: Gender[];
};

export type Agent = {
    id: number;
    name: string;
    email: string;
    password: string;
    country_id: number;
    city_id: number;
    gender_id: number;
    active: boolean;
    address: string;
    bio: string;
    profile_pic: string;
    description: string;
    country: Country;
    city: City;
    gender: Gender;
    specialization: string;
};

export type AgentActionsProps = {
    agent: Row<Agent>;
};

export type DeleteAgentProps = {
    agent: Agent;
    isOpen: boolean;
    closeModal: () => void;
};

export type EditAgentProps = {
    agent: Agent;
    isOpen: boolean;
    closeModal: () => void;
};
