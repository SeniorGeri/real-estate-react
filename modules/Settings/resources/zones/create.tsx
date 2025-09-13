'use client';

import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle, DialogTrigger} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import {FormEventHandler, useState} from 'react';
import { useTranslation } from 'react-i18next';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import { City } from '../cities/data';
import {  SelectItem } from '@/components/ui/select';
import { useCities } from './cities-context';
import CustomInput from '@/components/input/custom-input';
import CustomTextarea from '@/components/input/custom-textarea';
import CustomSelect from '@/components/input/custom-select';


export function CreateZone() {

    const cities = useCities(); // Access directly from context

    const { t } = useTranslation('Settings');


    const [open, setOpen] = useState(false);

    const {data, setData, post, processing, reset, errors, clearErrors} = useForm({
        name: '',
        city_id: '',
        description: '',
    });

    const storeCountCreateCity: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('zone.store'), {
            preserveScroll: true,
            onSuccess: () => cityCreated(),
            // onFinish: () => reset(),
        });
    };

    const closeModal: () => void = () => {
        clearErrors();
        reset();
        setOpen(false);
    };

    const cityCreated = () => {
        toast(t('zone_created_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <Dialog open={open} modal={true}>
            <DialogTrigger asChild>
                <Button variant="default" size="sm" onClick={() => setOpen(true)}>
                    {t('create_zone')}
                </Button>
            </DialogTrigger>
            <DialogContent>
                <DialogTitle>{t('create_zone')}</DialogTitle>
                <DialogDescription>
                    {t('create_zone_desc')}
                </DialogDescription>
                <form className="space-y-6" onSubmit={storeCountCreateCity}>
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
                        text = {cities.find((city: City) => city.id.toString() === data.city_id)?.city['en'] || t('select_city')}
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
                            <button type="submit">{t('add_zone')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
