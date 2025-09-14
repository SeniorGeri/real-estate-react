'use client';

import {AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle,} from '@/components/ui/alert-dialog';
import {router} from '@inertiajs/react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import {DeletePropertyProps} from "./data";
import { useTranslation } from 'react-i18next';

export function DeleteProperty({property, isOpen, closeModal}: DeletePropertyProps) {

    const { t } = useTranslation('Property');

    const destroyProperty = () => {
        router.delete(route('property.destroy', property.id), {
            preserveScroll: true,
            onSuccess: () => propertyDeleted(),
            onFinish: () => closeModal(),
        });
    };

    const propertyDeleted = () => {
        toast(t('property_delete_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <AlertDialog open={isOpen}>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>{t('delete_property')}?</AlertDialogTitle>
                    <AlertDialogDescription>
                        {t('delete_property_desc')}
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel onClick={closeModal}>{t('close')}</AlertDialogCancel>
                    <AlertDialogAction onClick={destroyProperty}>{t('delete')}</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    );
}
