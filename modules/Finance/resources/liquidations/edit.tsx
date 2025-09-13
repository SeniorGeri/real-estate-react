import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import {FormEventHandler} from 'react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import { useTranslation } from 'react-i18next';
import CustomInput from '@/components/input/custom-input';
import CustomTextarea from '@/components/input/custom-textarea';
import CustomSwitch from '@/components/input/custom-switch';
import {EditLiquidationProps} from "./data";

export function EditLiquidation({liquidation, isOpen, closeModal}: EditLiquidationProps) {

    const { t } = useTranslation('Finance');


    const {data, setData, put, processing, reset, errors, clearErrors} = useForm({
        id: liquidation?.id,
        value: liquidation?.value,
        approved: liquidation?.approved,
        description: liquidation?.description,
    });

    const updateLiquidation: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('liquidation.update', liquidation.id), {
            preserveScroll: true,
            onSuccess: () => updatedLiquidation(),
            onError: (error) => toast(error.description, {position: 'top-right', duration: 2000}),
            onFinish: () => reset(),
        });
    };

    const updatedLiquidation = () => {
        toast(t('liquidation_edit_succ'), {position: 'top-right', duration: 2000});
        clearErrors();
        reset();
        closeModal();

    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent>
                <DialogTitle>{t('edit_liquidation')}</DialogTitle>
                <DialogDescription>
                    {t('edit_liquidation_desc')}
                </DialogDescription>

                <form className="space-y-6" onSubmit={updateLiquidation}>

                     <CustomInput
                        id="value"
                        type="number"
                        value={data.value}
                        setFormData={setData}
                        placeholder={t('value')}
                        errorMessage={errors.value}
                    />

                    <CustomSwitch
                        id="approved"
                        is_checked={data.approved}
                        setFormData={setData}
                        placeholder={t('approved')}
                    />
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
                            <button type="submit">{t('edit_liquidation')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
