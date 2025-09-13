'use strict';

import {AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle,} from '@/components/ui/alert-dialog';
import {router} from '@inertiajs/react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import { useTranslation } from 'react-i18next';
import { DeleteAgentProps } from './data';

export function DeleteAgent({agent, isOpen, closeModal}: DeleteAgentProps) {

    const { t } = useTranslation('Hrm');

    const destroyAgent = () => {
        router.delete(route('agent.destroy', agent.id), {
            preserveScroll: true,
            onSuccess: () => agentDeleted(),
            onFinish: () => closeModal(),
        });
    };

    const agentDeleted = () => {
        toast(t('agent_delete_succ'), {position: 'top-right', duration: 2000});
        closeModal();
    };

    return (
        <AlertDialog open={isOpen}>
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>{t('delete_agent')}?</AlertDialogTitle>
                    <AlertDialogDescription>
                        {t('delete_agent_desc')}
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel onClick={closeModal}>{t('close')}</AlertDialogCancel>
                    <AlertDialogAction onClick={destroyAgent}>{t('delete')}</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    );
}
