'use client';

import {AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle,} from '@/components/ui/alert-dialog';
import {router} from '@inertiajs/react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import {DeleteTypeProps} from "./data";
import { useTranslation } from 'react-i18next';

export function DeleteType({type, isOpen, closeModal}: DeleteTypeProps) {

    const { t } = useTranslation('Property');

    const destroyType = () => {
        router.delete(route('property.type.destroy', type.id), {
            preserveScroll: true,
            onSuccess: () => typeDeleted(),
            onFinish: () => closeModal(),
        });
    };

    const typeDeleted = () => {
        toast(t('type_delete_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <AlertDialog open={isOpen}>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>{t('delete_type')}?</AlertDialogTitle>
                    <AlertDialogDescription>
                        {t('delete_type_desc')}
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel onClick={closeModal}>{t('close')}</AlertDialogCancel>
                    <AlertDialogAction onClick={destroyType}>{t('delete')}</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    );
}
