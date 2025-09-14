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


export function CreateStatus() {

    const { t } = useTranslation('Property');


    const [open, setOpen] = useState(false);

    const {data, setData, post, processing, reset, errors, clearErrors} = useForm({
        status: '',
        description: '',
        image: ''
    });

    const storeStatus: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('property.status.store'), {
            preserveScroll: true,
            onSuccess: () => statusCreated(),
            // onFinish: () => reset(),
        });
    };

    const closeModal: () => void = () => {
        clearErrors();
        reset();
        setOpen(false);
    };

    const statusCreated = () => {
        toast(t('status_created_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <Dialog open={open} modal={true}>
            <DialogTrigger asChild>
                <Button variant="default" size="sm" onClick={() => setOpen(true)}>
                    {t('create_status')}
                </Button>
            </DialogTrigger>
            <DialogContent>
                <DialogTitle>{t('create_status')}</DialogTitle>
                <DialogDescription>
                    {t('create_status_desc')}
                </DialogDescription>
                <form className="space-y-6" onSubmit={storeStatus}>

                    <CustomInput
                        id="status"
                        value={data.status}
                        setFormData={setData}
                        placeholder={t('status')}
                        errorMessage={errors.status}
                    />

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
                            <button type="submit">{t('add_status')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
