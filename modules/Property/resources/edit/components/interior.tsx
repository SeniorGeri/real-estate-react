'use client';

import CustomSwitch from '@/components/input/custom-switch';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import { useTranslation } from 'react-i18next';
import { InteriorProps } from '../props';
import CustomInput from '@/components/input/custom-input';

export default function Interior({ propertyData, setData, errors }: InteriorProps) {
    const { t } = useTranslation('Property');

    return (
        <>
            <Card>
                <CardHeader>
                    <div className="flex items-center justify-between">
                        <div>
                            <CardTitle>{t('interior')}</CardTitle>
                            <CardDescription>{t('interior_desc')}</CardDescription>
                        </div>
                    </div>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="grid sm:grid-cols-1 md:grid-cols-2 gap-4">


                        <CustomInput
                            id="bedrooms"
                            type="number"
                            placeholder={t('bedrooms')}
                            value={propertyData.bedrooms}
                            setFormData={setData}
                            errorMessage={errors?.property?.bedrooms}
                        />

                        
                        <CustomInput
                            id="bathrooms"
                            type="number"
                            placeholder={t('bathrooms')}
                            value={propertyData.bathrooms}
                            setFormData={setData}
                            errorMessage={errors?.property?.bathrooms}
                        />

                        
                        <CustomInput
                            id="floor"
                            type="number"
                            placeholder={t('floor')}
                            value={propertyData.floor}
                            setFormData={setData}
                            errorMessage={errors?.property?.floor}
                        />

                        
                        <CustomInput
                            id="garages"
                            type="number"
                            placeholder={t('garages')}
                            value={propertyData.garages}
                            setFormData={setData}
                            errorMessage={errors?.property?.garages}
                        />

                        <CustomInput
                            id="area"
                            type="number"
                            placeholder={t('area')}
                            value={propertyData.area}
                            setFormData={setData}
                            errorMessage={errors?.property?.area}
                        />

                        <CustomInput
                            id="net_area"
                            type="number"
                            placeholder={t('net_area')}
                            value={propertyData.net_area}
                            setFormData={setData}
                            errorMessage={errors?.property?.net_area}
                        />

                  
                    </div>
                </CardContent>
            </Card>
            <Card>
                <CardContent className="space-y-4">
                    <div className="flex items-center justify-between">
                        <div className="space-y-0.5">
                            <Label htmlFor="elevator">{t('elevator')}</Label>
                            <p className="text-muted-foreground text-sm">{t('elevator_desc')}</p>
                        </div>

                        <CustomSwitch id="elevator" setFormData={setData} is_checked={propertyData.elevator} />

                    </div>
                </CardContent>
            </Card>
        </>
    );
}