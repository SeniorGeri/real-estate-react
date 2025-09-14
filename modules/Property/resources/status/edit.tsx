import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import {FormEventHandler, useEffect} from 'react';
import {toast} from 'sonner';
import {EditStatusProps} from "./data";
import {route} from "ziggy-js";
import { useLocale } from '@/contexts/locale';
import { Languages } from '@/components/languages';
import { useTranslation } from 'react-i18next';
import FileInput from '@/modules/Media/resources/js/file-input';
import CustomInput from '@/components/input/custom-input';
import CustomTextarea from '@/components/input/custom-textarea';

export function EditStatus({status, isOpen, closeModal}: EditStatusProps) {

    const { t } = useTranslation('Property');

    const { currentLocale } = useLocale();

    const {data, setData, put, processing, reset, errors, clearErrors} = useForm({
        id: status?.id,
        status: status?.status ? status?.status[currentLocale] : '',
        description: status?.description,
        image: status?.image,
        locale: currentLocale ?? null
    });

    // eslint-disable-next-line react-hooks/exhaustive-deps
    useEffect(() =>setData('status', status?.status[data.locale] || '') , [data.locale]);

    const updateStatus: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('property.status.update', status.id), {
            preserveScroll: true,
            onSuccess: () => updatedStatus(),
            onError: (error) => toast(error.description, {position: 'top-right', duration: 2000}),
            onFinish: () => reset(),
        });
    };

    const updatedStatus = () => {
        toast(t('status_edit_succ'), {position: 'top-right', duration: 2000});
        clearErrors();
        reset();
        closeModal();

    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent>
                <DialogTitle>{t('edit_status')}</DialogTitle>
                <DialogDescription>
                    {t('edit_status_desc')}
                </DialogDescription>

                <form className="space-y-6" onSubmit={updateStatus}>
                    <Languages currentLocale={data.locale} setData={setData}/>

                     <CustomInput
                        id="status"
                        value={data.status}
                        setFormData={setData}
                        placeholder={t('status')}
                        errorMessage={errors.status}
                    />

                    <FileInput defaultValue={[data.image]} inputName='image' setFormData={setData} />


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
                            <button type="submit">{t('edit_status')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
