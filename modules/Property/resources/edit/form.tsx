'use client';

import { Button } from '@/components/ui/button';
import { useLocale } from '@/contexts/locale';
import { router, useForm } from '@inertiajs/react';
import { ArrowLeft, DollarSign, Eye, ImageIcon, Info, List, Map, Plus } from 'lucide-react';
import { useState } from 'react';
import { useTranslation } from 'react-i18next';
import { toast } from 'sonner';
import { route } from 'ziggy-js';
import { PropertyFormProps } from './props';
import General from './components/general';
import Images from './components/images';
import Pricing from './components/pricing';


export default function PropertyForm(props: PropertyFormProps) {

    const { t } = useTranslation('Property');
    const { currentLocale } = useLocale();

    const { setData, data, put, errors, clearErrors } = useForm({
        id: props.property.id,
        title: props.property.title[currentLocale],
        description: props.property.description[currentLocale],
        is_active: props.property.is_active,
        is_featured: props.property.is_featured,
        property_status_id: props.property.property_status_id,
        image: props.property.image,
        user_id: props.property.user_id,
        property_type_id: props.property.property_type_id,
        zone_id: props.property.zone_id,
        city_id: props.property.city_id,
        latitude: props.property.latitude,
        longitude: props.property.longitude,
        address: props.property.address,
        for_sale: props.property.for_sale,
        for_rent: props.property.for_rent,
        price: props.property.price,
        price_per_month: props.property.price_per_month,
        views: props.property.views,
        floor: props.property.floor,
        bedrooms: props.property.bedrooms,
        bathrooms: props.property.bathrooms,
        garages: props.property.garages,
        area: props.property.area,
        total_area: props.property.total_area,
        net_area: props.property.net_area,
        elevator: props.property.elevator,
        logo: props.property.logo,
        hover_image: props.property.hover_image,
        gallery: props.property.gallery,
        user: props.property.user,
        propertyType: props.property.propertyType,
        propertyStatus: props.property.propertyStatus,
        zone: props.property.zone,
        city: props.property.city,
        updated_at: props.property.updated_at,
    });

    const [isLoading, setIsLoading] = useState(false);
    const [activeTab, setActiveTab] = useState('general');

    async function onSubmit(event: React.FormEvent<HTMLFormElement>) {
        event.preventDefault();
        setIsLoading(true);
        put(route('property.update', props.property.id), {
            preserveScroll: true,
            onSuccess: () => {
                toast(t('property_updated_successfully'), { position: 'top-right', duration: 2000 });
                setIsLoading(false);
                clearErrors();
            },
        });
    }

    return (
        <form onSubmit={onSubmit} className="space-y-6">
            <div className="bg-background sticky top-0 z-30 flex items-center justify-between pt-2 pb-4">
                <div className="flex items-center gap-2">
                    <Button type="button" variant="outline" onClick={() => router.visit(route('property.list'))}>
                        <ArrowLeft className="mr-2 h-4 w-4" />
                        {t('back')}
                    </Button>

                    <div className="text-muted-foreground text-sm">
                        {isLoading ? t('saving') : t('last_saved') + ': ' + new Date(props.property.updated_at)}
                    </div>
                </div>

                <div className="flex items-center gap-2">
                    <Button type="button" variant="outline" onClick={() => console.log('FRONTEND')}>
                        <Eye className="mr-2 h-4 w-4" />
                        {t('preview')}
                    </Button>
                    <Button type="submit" disabled={isLoading}>
                        {isLoading ? t('saving') : t('save_changes')}
                    </Button>
                </div>
            </div>

            <div className="grid grid-cols-1 gap-6 lg:grid-cols-5">
                <div className="lg:col-span-1">
                    <div className="space-y-1">
                        <Button
                            type="button"
                            variant={activeTab === 'general' ? 'default' : 'ghost'}
                            className="w-full justify-start"
                            onClick={() => setActiveTab('general')}
                        >
                            <Info className="mr-2 h-4 w-4" />
                            {t('general')}
                        </Button>
                        <Button
                            type="button"
                            variant={activeTab === 'images' ? 'default' : 'ghost'}
                            className="w-full justify-start"
                            onClick={() => setActiveTab('images')}
                        >
                            <ImageIcon className="mr-2 h-4 w-4" />
                            {t('images')}
                        </Button>
                        
                        <Button
                            type="button"
                            variant={activeTab === 'pricing' ? 'default' : 'ghost'}
                            className="w-full justify-start"
                            onClick={() => setActiveTab('pricing')}
                        >
                            <DollarSign className="mr-2 h-4 w-4" />
                            {t('pricing')}
                        </Button>

                        <Button
                            type="button"
                            variant={activeTab === 'interior' ? 'default' : 'ghost'}
                            className="w-full justify-start"
                            onClick={() => setActiveTab('interior')}
                        >
                            <List className="mr-2 h-4 w-4" />
                            {t('interior')}
                        </Button>

                        <Button
                            type="button"
                            variant={activeTab === 'location' ? 'default' : 'ghost'}
                            className="w-full justify-start"
                            onClick={() => setActiveTab('location')}
                        >
                            <Map className="mr-2 h-4 w-4" />
                            {t('location')}
                        </Button>

                        <Button
                            type="button"
                            variant={activeTab === 'extra' ? 'default' : 'ghost'}
                            className="w-full justify-start"
                            onClick={() => setActiveTab('extra')}
                        >
                            <Plus className="mr-2 h-4 w-4" />
                            {t('extra')}
                        </Button>

                    </div>
                </div>

                <div className="lg:col-span-4">
                    <div className="space-y-6 pr-4">
                        {activeTab === 'general' && (
                            <General setData={setData} propertyData={data} statuses={props.propertyStatuses} types={props.propertyTypes} errors={errors} />
                        )}
                        {activeTab === 'images' && <Images images={data.gallery} setData={setData} />}
                        {activeTab === 'pricing' && <Pricing setData={setData} propertyData={data} currencies={props.currencies} errors={errors} />}
                    </div>
                </div>
            </div>
        </form>
    );
}