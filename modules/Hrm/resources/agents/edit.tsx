import { Button } from '@/components/ui/button';
import { Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle } from '@/components/ui/dialog';
import { useForm } from '@inertiajs/react';
import { FormEventHandler, useEffect } from 'react';
import { toast } from 'sonner';
import { EditAgentProps } from "./data";
import { route } from "ziggy-js";
import { useTranslation } from 'react-i18next';
import { SelectItem } from '@/components/ui/select';
import { Country } from '@/modules/Settings/resources/countries/data';
import CustomSelect from '@/components/input/custom-select';
import CustomTextarea from '@/components/input/custom-textarea';
import CustomSwitch from '@/components/input/custom-switch';
import CustomInput from '@/components/input/custom-input';
import FileInput from '@/modules/Media/resources/js/file-input';
import { City } from '@/modules/Settings/resources/cities/data';
import { Gender } from '@/modules/Settings/resources/genders/data';
import { useLocale } from '@/contexts/locale';
import { Languages } from '@/components/languages';
import { useAgentData } from './agent-data-context';

export function EditAgent({ agent, isOpen, closeModal }: EditAgentProps) {

    const { t } = useTranslation('Hrm');
    const agentData = useAgentData(); // Access directly from context
    const { currentLocale } = useLocale();

    const { data, setData, put, processing, reset, errors, clearErrors } = useForm({
        id: agent?.id,
        name: agent?.name,
        email: agent?.email,
        country_id: agent?.country_id,
        city_id: agent?.city_id,
        gender_id: agent?.gender_id,
        active: agent?.active,
        address: agent?.address,
        phone: agent?.phone,
        bio: agent?.bio[currentLocale] ?? '',
        profile_pic: agent?.profile_pic,
        locale: currentLocale ?? null

    });

    // eslint-disable-next-line react-hooks/exhaustive-deps
    useEffect(() => setData('bio', agent?.bio[data.locale] || ''), [data.locale]);

    const updateAgent: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('agent.update', agent.id), {
            preserveScroll: true,
            onSuccess: () => updatedAgent(),
            onError: (error) => toast(error.description, { position: 'top-right', duration: 2000 }),
            onFinish: () => reset(),
        });
    };

    const updatedAgent = () => {
        toast(t('agent_edit_succ'), { position: 'top-right', duration: 2000 });
        clearErrors();
        reset();
        closeModal();

    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent className="sm:max-w-4xl">
                <DialogTitle>{t('edit_agent')}</DialogTitle>
                <DialogDescription>
                    {t('edit_agent_desc')}
                </DialogDescription>

                <form className="space-y-6" onSubmit={updateAgent}>
                    <div className="grid grid-cols-1 sm:grid-cols-3 md:gap-3">

                        <CustomInput
                            id="name"
                            value={data.name}
                            setFormData={setData}
                            placeholder={t('name')}
                            errorMessage={errors.name}
                            className='col-span-1'
                        />

                        <CustomInput
                            id="email"
                            type="email"
                            value={data.email}
                            setFormData={setData}
                            placeholder={t('email')}
                            errorMessage={errors.email}
                            className='col-span-1'
                        />


                        <CustomInput   
                            id="phone"
                            value={data.phone}
                            setFormData={setData}
                            placeholder={t('phone')}
                            errorMessage={errors.phone}
                        />

                    </div>

                    <div className="grid grid-cols-1 sm:grid-cols-4 md:gap-3">

                        <CustomSelect
                            id="country_id"
                            className='col-span-1'
                            value={data.country_id}
                            text={agentData.countries.find((count: Country) => count.id === data.country_id)?.country['en'] || t('select_country')}
                            setFormData={setData}
                            placeholder={t('country')}
                            errorMessage={errors.country_id}
                        >
                            <>
                                {agentData.countries.map((country: Country) => (
                                    <SelectItem key={country.id} value={country.id.toString()}>{country.country['en']}</SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomSelect
                            id="city_id"
                            className='col-span-1'
                            value={data.city_id}
                            text={agentData.cities.find((city: City) => city.id === data.city_id)?.city['en'] || t('select_city')}
                            setFormData={setData}
                            placeholder={t('city')}
                            errorMessage={errors.city_id}
                        >
                            <>
                                {agentData.cities.map((city: City) => (
                                    <SelectItem key={city.id} value={city.id.toString()}>{city.city['en']}</SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomSelect
                            id="gender_id"
                            className='col-span-1'
                            value={data.gender_id}
                            text={agentData.genders.find((gender: Gender) => gender.id.toString() === data.gender_id?.toString())?.gender['en'] || t('select_gender')}
                            setFormData={setData}
                            placeholder={t('gender')}
                            errorMessage={errors.gender_id}
                        >
                            <>
                                {agentData.genders.map((gender: Gender) => (
                                    <SelectItem key={gender.id} value={gender.id.toString()}>{gender.gender['en']}</SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                        <CustomInput
                            id="address"
                            value={data.address}
                            setFormData={setData}
                            placeholder={t('address')}
                            errorMessage={errors.address}
                        />
                        <CustomSwitch
                            id="active"
                            is_checked={data.active}
                            setFormData={setData}
                            placeholder={t('active')}
                        />
                    </div>
                    <Languages currentLocale={data.locale} setData={setData} />


                    <div className="grid grid-cols-1 sm:grid-cols-2 md:gap-3 gap-1">

                        <FileInput defaultValue={[data.profile_pic]} inputName='profile_pic' setFormData={setData} />

                        <CustomTextarea
                            id="bio"
                            value={data.bio}
                            setFormData={setData}
                            // placeholder={t('bio')}
                            errorMessage={errors.bio}
                        />
                    </div>

                    <DialogFooter className="gap-2">
                        <DialogClose asChild>
                            <Button variant="secondary" onClick={closeModal}>
                                {t('close')}
                            </Button>
                        </DialogClose>

                        <Button variant="default" disabled={processing} asChild>
                            <button type="submit">{t('edit_agent')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
