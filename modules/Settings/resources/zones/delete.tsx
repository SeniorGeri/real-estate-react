'use client';

import {AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle,} from '@/components/ui/alert-dialog';
import {router} from '@inertiajs/react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import {DeleteZoneProps} from "./data";
import { useTranslation } from 'react-i18next';

export function DeleteZone({zone, isOpen, closeModal}: DeleteZoneProps) {

    const { t } = useTranslation('Settings');

    const destroyZone = () => {
        router.delete(route('zone.destroy', zone.id), {
            preserveScroll: true,
            onSuccess: () => zoneDeleted(),
            onFinish: () => closeModal(),
        });
    };

    const zoneDeleted = () => {
        toast(t('zone_delete_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <AlertDialog open={isOpen}>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>{t('delete_zone')}?</AlertDialogTitle>
                    <AlertDialogDescription>
                        {t('delete_zone_desc')}
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel onClick={closeModal}>{t('close')}</AlertDialogCancel>
                    <AlertDialogAction onClick={destroyZone}>{t('delete')}</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    );
}
