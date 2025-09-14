'use client';

import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { useTranslation } from 'react-i18next';
import { LocationProps } from '../../props';
import CustomInput from '@/components/input/custom-input';
import CustomSelect from '@/components/input/custom-select';
import { City } from '@/modules/Settings/resources/cities/data';
import { SelectItem } from '@/components/ui/select';
import { Zone } from '@/modules/Settings/resources/zones/data';
import Map from './map';

export default function Location({ propertyData, cities, zones, setData, errors }: LocationProps) {
    const { t } = useTranslation('Property');


    console.log(propertyData.latitude, propertyData.longitude);
    return (
        <>
            <Card>
                <CardHeader>
                    <div className="flex items-center justify-between">
                        <div>
                            <CardTitle>{t('location')}</CardTitle>
                            <CardDescription>{t('location_desc')}</CardDescription>
                        </div>
                    </div>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="grid sm:grid-cols-1 md:grid-cols-3 gap-4">
                        <CustomSelect
                            id="city_id"
                            placeholder={t('city')}
                            text={
                                cities.find((count: City) => count.id?.toString() === propertyData.city_id?.toString())?.city['en'] ||
                                t('select_city')
                            }
                            className="col-span-1 w-full"
                            errorMessage={errors?.property?.city_id}
                            value={propertyData.city_id?.toString()}
                            setFormData={setData}
                        >
                            <>
                                {cities.map((city: City) => (
                                    <SelectItem key={city.id} value={city.id?.toString()}>
                                        {city.city['en']}
                                    </SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomSelect
                            id="zone_id"
                            placeholder={t('zone')}
                            text={
                                zones.find((count: Zone) => count.id?.toString() === propertyData.zone_id?.toString())?.name['en'] ||
                                t('select_zone')
                            }
                            className="col-span-1 w-full"
                            errorMessage={errors?.property?.zone_id}
                            value={propertyData.zone_id?.toString()}
                            setFormData={setData}
                        >
                            <>
                                {zones.map((zone: Zone) => (
                                    <SelectItem key={zone.id} value={zone.id?.toString()}>
                                        {zone.name['en']}
                                    </SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomInput
                            id="address"
                            placeholder={t('address')}
                            setFormData={setData}
                            value={propertyData.address}
                            errorMessage={errors?.property?.address}
                        />




                    </div>
                </CardContent>
            </Card>
            <Card>
                <CardHeader>
                    <CardTitle>{t('map')}</CardTitle>
                    <CardDescription>{t('map_desc')}</CardDescription>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                        <CustomInput
                            id="latitude"
                            placeholder={t('latitude')}
                            setFormData={setData}
                            value={propertyData.latitude}
                            disabled={true}
                            errorMessage={errors?.property?.latitude}
                        />


                        <CustomInput
                            id="longitude"
                            placeholder={t('longitude')}
                            setFormData={setData}
                            value={propertyData.longitude}
                            disabled={true}
                            errorMessage={errors?.property?.longitude}
                        />
                    </div>
                    <Map onChange={(lat: number, lng: number) => {
                        setData('latitude', lat);
                        setData('longitude', lng);
                    }} initialLat={propertyData.latitude ?? 41.3275} initialLng={propertyData.longitude ?? 19.8189} />

                </CardContent>
            </Card>
        </>
    );
}