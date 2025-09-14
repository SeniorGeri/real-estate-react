'use client';

import {AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle,} from '@/components/ui/alert-dialog';
import {router} from '@inertiajs/react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import {DeleteStatusProps} from "./data";
import { useTranslation } from 'react-i18next';

export function DeleteStatus({status, isOpen, closeModal}: DeleteStatusProps) {

    const { t } = useTranslation('Property');

    const destroyStatus = () => {
        router.delete(route('property.status.destroy', status.id), {
            preserveScroll: true,
            onSuccess: () => statusDeleted(),
            onFinish: () => closeModal(),
        });
    };

    const statusDeleted = () => {
        toast(t('status_delete_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <AlertDialog open={isOpen}>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>{t('delete_status')}?</AlertDialogTitle>
                    <AlertDialogDescription>
                        {t('delete_status_desc')}
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel onClick={closeModal}>{t('close')}</AlertDialogCancel>
                    <AlertDialogAction onClick={destroyStatus}>{t('delete')}</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    );
}
