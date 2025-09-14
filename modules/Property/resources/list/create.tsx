'use client';

import CustomInput from '@/components/input/custom-input';
import CustomTextarea from '@/components/input/custom-textarea';
import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle, DialogTrigger} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import FileInput from '@/modules/Media/resources/js/file-input';
import {FormEventHandler, useState} from 'react';
import { useTranslation } from 'react-i18next';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import { usePage } from '@inertiajs/react';
import { InertiaLangPageProps } from '@/types/helpers';
import { useAgents } from './agents-context';
import CustomSelect from '@/components/input/custom-select';
import { SelectItem } from '@/components/ui/select';
import { Agent } from '@/modules/Hrm/resources/agents/profile/data';


export function CreateProperty() {

    const { auth } = usePage<InertiaLangPageProps>().props;
    const { t } = useTranslation('Property');
    const agents = useAgents();

    const [open, setOpen] = useState(false);

    const {data, setData, post, processing, reset, errors, clearErrors} = useForm({
        title: '',
        description: '',
        user_id: auth?.user?.id || null ,
        image: ''
    });

    const storeProperty: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('property.store'), {
            preserveScroll: true,
            onSuccess: () => propertyCreated(),
            // onFinish: () => reset(),
        });
    };

    const closeModal: () => void = () => {
        clearErrors();
        reset();
        setOpen(false);
    };

    const propertyCreated = () => {
        toast(t('property_created_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <Dialog open={open} modal={true}>
            <DialogTrigger asChild>
                <Button variant="default" size="sm" onClick={() => setOpen(true)}>
                    {t('create_property')}
                </Button>
            </DialogTrigger>
            <DialogContent>
                <DialogTitle>{t('create_property')}</DialogTitle>
                <DialogDescription>
                    {t('create_property_desc')}
                </DialogDescription>
                <form className="space-y-6" onSubmit={storeProperty}>

                    <CustomInput
                        id="title"
                        value={data.title}
                        setFormData={setData}
                        placeholder={t('title')}
                        errorMessage={errors.title}
                    />

                    {auth?.user?.id === 1 && (
                        <CustomSelect
                            id="user_id"
                            value={data.user_id}
                            text = {agents.find((agent: Agent) => agent.id.toString() === data.user_id)?.name || t('select_agent')}
                            setFormData={setData}
                            placeholder={t('agent')}
                            errorMessage={errors.user_id}
                        >   
                            <>
                                {agents.map((agent : Agent) => (
                                    <SelectItem key={agent.id} value={agent.id.toString()}>{agent.name}</SelectItem>
                                ))}
                            </>
                        </CustomSelect>
                    )}

                    <FileInput inputName='image' setFormData={setData} />

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
                            <button type="submit">{t('add_property')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
