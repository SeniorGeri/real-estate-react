import { TranslatableField } from "@/types/helpers";
import { Agent } from "@/modules/Hrm/resources/agents/data";
import { Type } from "../type/data";
import { Status } from "../status/data";
import { Zone } from "@/modules/Settings/resources/zones/data";
import { City } from "@/modules/Settings/resources/cities/data";
import { Currency } from "@/modules/Settings/resources/currencies/data";

export type PropertyFormProps = {
   property: Property;
   propertyTypes: Type[];
   propertyStatuses: Status[];
   zones: Zone[];
   cities: City[];
   currencies: Currency[];
   agents: Agent[];
}

export type PropertyForm = {
    id: number;
    title: string;
    description: string;
    user_id: number;
    property_type_id: number;
    property_status_id: number;
    zone_id: number;
    city_id: number;
    latitude: string;
    longitude: string;
    address: string;
    for_sale: boolean;
    for_rent: boolean;
    currency_id: number;
    price: number;
    price_per_month: number;
    views: number;
    is_featured: boolean;
    floor: number;
    is_active: boolean;
    bedrooms: number;
    bathrooms: number;
    garages: number;
    area: number;
    total_area: number;
    net_area: number;
    elevator: boolean;
    logo: string;
    hover_image: string;
    gallery: string[];
    PropertyAttributeProps: PropertyAttributeProps[];
    image: string;
    updated_at: string;
}

export type Property = {
    id: number;
    title: TranslatableField;
    description: TranslatableField;
    user_id: number;
    property_type_id: number;
    property_status_id: number;
    zone_id: number;
    city_id: number;
    latitude: string;
    longitude: string;
    address: string;
    for_sale: boolean;
    for_rent: boolean;
    price: number;
    price_per_month: number;
    views: number;
    is_featured: boolean;
    floor: number;
    is_active: boolean;
    bedrooms: number;
    bathrooms: number;
    garages: number;
    area: number;
    total_area: number;
    net_area: number;
    elevator: boolean;
    logo: string;
    hover_image: string;
    gallery: string[];
    image: string;
    user: Agent;
    property_type: Type;
    property_status: Status;
    zone: Zone;
    city: City;
    updated_at: string;
    property_attributes: PropertyAttribute[];
}

export type PropertyAttribute = {
    id: number;
    property_id: number;
    attribute: TranslatableField;
    value: TranslatableField;
    image: string;
}

export type PropertyAttributeForm = {
    id: number|string;
    attribute: string;
    value: string;
    image: string;
}

export type GeneralProps = {
    propertyData: PropertyForm;
    statuses: Status[];
    types: Type[];
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}
export type AgentProps = {
    propertyData: PropertyForm;
    agents: Agent[];
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}

export type LocationProps = {
    propertyData: PropertyForm;
    cities: City[];
    zones: Zone[];
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}


export type PricingProps = {
    propertyData: PropertyForm;
    currencies: Currency[];
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}

export type InteriorProps = {
    propertyData: PropertyForm;
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}

export type ImagesProps = {
    images: string[];
    setData: (key: string, value: string[]) => void;
}


export type PropertyAttributeProps = {
    propertyAttributes: PropertyAttributeForm[];
    setData: (key: string, value: PropertyAttributeForm[]) => void;
};


export type Auth = {
    permissions: string[];
    user: Agent;
};

export type InertiaPageProps = {
    auth: Auth;
};