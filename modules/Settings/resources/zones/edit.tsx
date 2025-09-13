import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import {FormEventHandler, useEffect} from 'react';
import {toast} from 'sonner';
import {EditZoneProps} from "./data";
import {route} from "ziggy-js";
import { useLocale } from '@/contexts/locale';
import { Languages } from '@/components/languages';
import { useTranslation } from 'react-i18next';
import {SelectItem} from '@/components/ui/select';
import { useCities } from './cities-context';
import CustomInput from '@/components/input/custom-input';
import CustomSelect from '@/components/input/custom-select';
import CustomTextarea from '@/components/input/custom-textarea';
import { City } from '../cities/data';

export function EditZone({zone, isOpen, closeModal}: EditZoneProps) {

    const { t } = useTranslation('Settings');
    const cities = useCities(); // Access directly from context

    const { currentLocale } = useLocale();
    const {data, setData, put, processing, reset, errors, clearErrors} = useForm({
        id: zone?.id,
        name: zone?.name ? zone?.name[currentLocale] : '',
        city_id: zone?.city_id,
        description: zone?.description,
        locale: currentLocale ?? null
    });

    // eslint-disable-next-line react-hooks/exhaustive-deps
    useEffect(() =>setData('name', zone?.name[data.locale] || '') , [data.locale]);

    const updateCity: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('zone.update', zone.id), {
            preserveScroll: true,
            onSuccess: () => updatedCity(),
            onError: (error) => toast(error.description, {position: 'top-right', duration: 2000}),
            onFinish: () => reset(),
        });
    };

    const updatedCity = () => {
        toast(t('city_edit_succ'), {position: 'top-right', duration: 2000});
        clearErrors();
        reset();
        closeModal();

    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent>
                <DialogTitle>{t('edit_zone')}</DialogTitle>
                <DialogDescription>
                    {t('edit_zone_desc')}
                </DialogDescription>

                <form className="space-y-6" onSubmit={updateCity}>
                    <Languages currentLocale={data.locale} setData={setData}/>

                    <CustomInput
                        id="name"
                        value={data.name}
                        setFormData={setData}
                        placeholder={t('name')}
                        errorMessage={errors.name}
                    />


                    <CustomSelect
                        id="city_id"
                        value={data.city_id}
                        text = {cities.find((city: City) => city.id === data.city_id)?.city['en'] || t('select_city')}
                        setFormData={setData}
                        placeholder={t('city')}
                        errorMessage={errors.city_id}
                    >   
                        <>
                            {cities.map((city : City) => (
                                <SelectItem key={city.id} value={city.id.toString()}>{city.city['en']}</SelectItem>
                            ))}
                        </>
                    </CustomSelect>

                    <CustomTextarea
                        id="description"
                        value={data.description}
                        setFormData={setData}
                        placeholder={t('description')}
                        errorMessage={errors.description}
                    />              
                    

                    <DialogFooter className="gap-2">
                        <DialogClose asChild>
                            <Button variant="secondary" onClick={closeModal}>
                                {t('close')}
                            </Button>
                        </DialogClose>

                        <Button variant="default" disabled={processing} asChild>
                            <button type="submit">{t('edit_zone')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
