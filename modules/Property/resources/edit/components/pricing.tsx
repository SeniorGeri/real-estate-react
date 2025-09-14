'use client';

import CustomSelect from '@/components/input/custom-select';
import CustomSwitch from '@/components/input/custom-switch';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import { SelectItem } from '@/components/ui/select';
import { Separator } from '@/components/ui/separator';
import { useTranslation } from 'react-i18next';
import { PricingProps } from '../props';
import { Currency } from '@/modules/Settings/resources/currencies/data';
import CustomInput from '@/components/input/custom-input';

export default function Pricing({ propertyData, setData, currencies, errors }: PricingProps) {
    const { t } = useTranslation('Property');

    return (
        <>
            <Card>
                <CardHeader>
                    <div className="flex items-center justify-between">
                        <div>
                            <CardTitle>{t('pricing')}</CardTitle>
                            <CardDescription>{t('pricing_desc')}</CardDescription>
                        </div>
                    </div>
                </CardHeader>
                <CardContent className="space-y-4">
                    <CustomSelect
                        id="currency_id"
                        placeholder={t('currency')}
                        text={
                            currencies.find((count: Currency) => count.id?.toString() === propertyData.currency_id?.toString())?.symbol ||
                            t('select_currency')
                        }
                        className="col-span-1 w-full"
                        errorMessage={errors?.property?.currency_id}
                        value={propertyData.currency_id?.toString()}
                        setFormData={setData}
                    >
                        <>
                            {currencies.map((currency: Currency) => (
                                <SelectItem key={currency.id} value={currency.id?.toString()}>
                                    {currency.symbol}
                                </SelectItem>
                            ))}
                        </>
                    </CustomSelect>
                    <div className="grid sm:grid-cols-1 md:grid-cols-2 gap-4">


                        <CustomInput
                            id="price"
                            type="number"
                            placeholder={t('price')}
                            value={propertyData.price}
                            setFormData={setData}
                            errorMessage={errors?.property?.price}
                        />
                        <CustomInput
                            id="price_per_month"
                            type="number"
                            placeholder={t('price_per_month')}
                            value={propertyData.price_per_month}
                            setFormData={setData}
                            errorMessage={errors?.property?.price_per_month}
                        />



                    </div>
                </CardContent>
            </Card>
            <Card>
                <CardHeader>
                    <CardTitle>{t('pricing_type')}</CardTitle>
                    <CardDescription>{t('pricing_type_desc')}</CardDescription>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="flex items-center justify-between">
                        <div className="space-y-0.5">
                            <Label htmlFor="for_sale">{t('for_sale')}</Label>
                            <p className="text-muted-foreground text-sm">{t('for_sale_desc')}</p>
                        </div>

                        <CustomSwitch id="for_sale" setFormData={setData} is_checked={propertyData.for_sale} />

                    </div>
                    <Separator />
                    <div className="flex items-center justify-between">
                        <div className="space-y-0.5">
                            <Label htmlFor="for_rent">{t('for_rent')}</Label>
                            <p className="text-muted-foreground text-sm">{t('for_rent_desc')}
                            </p>
                        </div>
                        <CustomSwitch id="for_rent" setFormData={setData} is_checked={propertyData.for_rent} />



                    </div>
                </CardContent>
            </Card>
        </>
    );
}