'use client';

import CustomInput from '@/components/input/custom-input';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Plus, Trash2 } from 'lucide-react';
import { useTranslation } from 'react-i18next';
import { PropertyAttributeProps, PropertyAttributeForm } from '../props';
import FileInput from '@/modules/Media/resources/js/file-input';

export default function Extra({ propertyAttributes, setData }: PropertyAttributeProps) {

    const { t } = useTranslation('Property');
    const generateRandomNum = () => Date.now().toString(36) + Math.random().toString(36).substr(2, 5);

    const setKey = (key: string, value: string) => {
        const [keySelector, id]: ['attribute' | 'image' | 'value', string] = key.split('.') as ['attribute' | 'image' | 'value', string];
        setData(
            'propertyAttributes',
            propertyAttributes.map((key: PropertyAttributeForm) => {
                if (key.id.toString() === id) {
                    key[keySelector] = value;
                }
                return key;
            }),
        );
    };
    return (
        <Card>
            <CardHeader>
                <CardTitle>{t('attributes')}</CardTitle>
                <CardDescription>{t('attributes_desc')}

                    <Button
                        type="button"
                        size="sm"
                        className="float-end"
                        onClick={() =>
                            setData('propertyAttributes', [
                                ...propertyAttributes,
                                {
                                    id: generateRandomNum(),
                                    attribute: 'New attribute',
                                    value: 'New attribute value',
                                    image: '',
                                },
                            ])
                        }>
                        <Plus className="mr-1 h-4 w-4" />
                        {t('add_attribute')}
                    </Button>
                </CardDescription>

            </CardHeader>
            <CardContent className="space-y-4">
                <div className="space-y-4">
                    <div className="divide-y rounded-md">
                        {propertyAttributes.map((key: PropertyAttributeForm, index) => (
                            <div key={index} className="flex flex-col justify-end">
                                <div className="grid gap-3 space-y-2 p-3 sm:grid-cols-1 md:grid-cols-2">
                                    <div className="col-span-1 pt-3">
                                        <FileInput inputName={'image.' + key.id} defaultValue={[key.image]} setFormData={setKey} />
                                    </div>
                                    <div className="col-span-1 space-y-2">
                                        <CustomInput
                                            className="w-full"
                                            value={key.attribute}
                                            setFormData={setKey}
                                            id={'attribute.' + key.id}
                                            placeholder={t('attribute')}
                                        />
                                        <CustomInput
                                            id={'value.' + key.id}
                                            value={key.value}
                                            placeholder={t('value')}
                                            setFormData={setKey}
                                        />

                                        <Button
                                            type="button"
                                            // variant="ghost"
                                            size="sm"
                                            className="float-end m-2"
                                            onClick={() => {
                                                setData(
                                                    'propertyAttributes',
                                                    propertyAttributes.filter((_: PropertyAttributeForm, i: number) => i !== index),
                                                );
                                            }}
                                        >
                                            {t('remove_attribute')} <Trash2 className="h-4 w-4" />
                                        </Button>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </CardContent>
        </Card>
    );
}