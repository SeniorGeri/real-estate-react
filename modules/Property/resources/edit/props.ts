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
    propertyType: Type;
    propertyStatus: Status;
    zone: Zone;
    city: City;
    updated_at: string;
}


export type GeneralProps = {
    propertyData: PropertyForm;
    statuses: Status[];
    types: Type[];
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}

export type PricingProps = {
    propertyData: PropertyForm;
    currencies: Currency[];
    errors: any;
    setData?: (key: string, value: string | number| boolean | object) => void
}

export type ImagesProps = {
    images: string[];
    setData: (key: string, value: string[]) => void;
}