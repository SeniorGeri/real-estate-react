import { TranslatableField } from "@/types/helpers";

import { City } from "@/modules/Settings/resources/cities/data";
import { Country } from "@/modules/Settings/resources/countries/data";
import { Gender } from "@/modules/Settings/resources/genders/data";
import { Zone } from "@/modules/Settings/resources/zones/data";

export type Agent = {
    active: boolean;
    address: string;
    bio: TranslatableField;
    city: City;
    city_id: number;
    country: Country;
    country_id: number;
    zone: Zone;
    zone_id: number;
    created_at: string;
    deleted_at: string;
    email: string;
    email_verified_at: string;
    gender: Gender;
    gender_id: number;
    id: number;
    name: string;
    phone: string;
    profile_pic: string;
    properties_count: number;
    active_properties: number;
    
}