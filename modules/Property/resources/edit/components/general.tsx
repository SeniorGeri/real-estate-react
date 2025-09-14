'use client';

import CustomInput from '@/components/input/custom-input';
import CustomSelect from '@/components/input/custom-select';
import CustomSwitch from '@/components/input/custom-switch';
import CustomTextEditor from '@/components/input/custom-text-editor';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import { SelectItem } from '@/components/ui/select';
import { Separator } from '@/components/ui/separator';
import { useTranslation } from 'react-i18next';
import { GeneralProps } from '../props';
import { Status } from '../../status/data';
import { Type } from '../../type/data';

export default function General({ propertyData, setData, statuses, types, errors }: GeneralProps) {
    const { t } = useTranslation('Property');
 
    return (
        <>
            <Card>
                <CardHeader>
                    <div className="flex items-center justify-between">
                        <div>
                            <CardTitle>{t('basic_information')}</CardTitle>
                            <CardDescription>{t('basic_information_desc')}</CardDescription>
                        </div>
                        <Badge variant={propertyData.property_status_id === 2 ? 'default' : 'secondary'}>
                            {propertyData.property_status_id === 2 ? 'Published' : 'Draft'}
                        </Badge>
                    </div>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="grid grid-cols-1 gap-4">
                        <CustomInput
                            id="title"
                            placeholder={t('title') + ' *'}
                            setFormData={setData}
                            value={propertyData.title}
                            errorMessage={errors?.property?.title}
                        />
                        <CustomSelect
                            id="property_status_id"
                            placeholder={t('status')}
                            text={
                                statuses.find((count: Status) => count.id?.toString() === propertyData.property_status_id?.toString())?.status['en'] ||
                                t('select_status')
                            }
                            className="col-span-1 w-full"
                            errorMessage={errors?.property?.property_status_id}
                            value={propertyData.property_status_id?.toString()}
                            setFormData={setData}
                        >
                            <>
                                {statuses.map((status: Status) => (
                                    <SelectItem key={status.id} value={status.id?.toString()}>
                                        {status.status['en']}
                                    </SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomSelect
                            id="property_type_id"
                            placeholder={t('type')}
                            text={
                                types.find((count: Type) => count.id?.toString() === propertyData.property_type_id?.toString())?.type['en'] ||
                                t('select_type')
                            }
                            className="col-span-1 w-full"
                            errorMessage={errors?.property?.property_type_id}
                            value={propertyData.property_type_id?.toString()}
                            setFormData={setData}
                        >
                            <>
                                {types.map((type: Type) => (
                                    <SelectItem key={type.id} value={type.id?.toString()}>
                                        {type.type['en']}
                                    </SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomTextEditor
                            id="description"
                            height={300}
                            setFormData={setData}
                            placeholder={t('description')}
                            defaultValue={propertyData.description}
                            errorsMessage={errors?.property?.description}
                        />
                    </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader>
                    <CardTitle>{t('preview')}</CardTitle>
                    <CardDescription>{t('preview_desc')}</CardDescription>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="flex items-center justify-between">
                        <div className="space-y-0.5">
                            <Label htmlFor="is_active">{t('active')}</Label>
                            <p className="text-muted-foreground text-sm">{t('active_desc')}</p>
                        </div>
                        <CustomSwitch id="is_active" setFormData={setData} is_checked={propertyData.is_active} />
                    </div>
                    <Separator />
                    <div className="flex items-center justify-between">
                        <div className="space-y-0.5">
                            <Label htmlFor="is_featured">{t('featured')}</Label>
                            <p className="text-muted-foreground text-sm">{t('featured_desc')}</p>
                        </div>
                        <CustomSwitch id="is_featured" setFormData={setData} is_checked={propertyData.is_featured} />
                    </div>
                </CardContent>
            </Card>
        </>
    );
}