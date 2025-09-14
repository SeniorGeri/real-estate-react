import { TranslatableField } from "@/types/helpers";

export type Agent = {
    active: boolean;
    address: string;
    bio: TranslatableField;
    city: string;
    city_id: number;
    country: string;
    country_id: number;
    created_at: string;
    deleted_at: string;
    email: string;
    email_verified_at: string;
    gender: string;
    gender_id: number;
    id: number;
    name: string;
    phone: string;
    profile_pic: string;
    
}