'use client';

import {Button} from '@/components/ui/button';
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuSeparator, DropdownMenuShortcut, DropdownMenuTrigger} from '@/components/ui/dropdown-menu';
import {MoreHorizontal} from 'lucide-react';
import {useCallback, useState} from 'react';
import {Status, StatusActionsProps} from "./data.js";
import {EditStatus} from "./edit.js";
import {DeleteStatus} from "./delete.js";
import { useTranslation } from 'react-i18next';
import { usePermissions } from '@/hooks/use-permissions.js';

export function StatusActions({status}: StatusActionsProps) {

    const { t } = useTranslation('Property');

    const { hasPermission, hasAnyPermission} = usePermissions();

    const [selectedStatus, setSelectedStatus] = useState<Status| undefined>(undefined);

    const [selectedAction, setSelectedAction] = useState<'edit' | 'delete' | null>(null);

    const handleAction = useCallback((status: Status, action: 'edit' | 'delete') => {
        setTimeout(() => {
            setSelectedStatus(status);
            setSelectedAction(action);
        }, 10)
    }, []);

    if (!hasAnyPermission(['property_status.update', 'property_status.delete'])) {
        return null;
    }

    return (
        <>
            <DropdownMenu>
                <DropdownMenuTrigger asChild>
                    <Button variant="ghost" className="data-[state=open]:bg-muted flex h-6 w-8 p-0">
                        <MoreHorizontal/>
                        <span className="sr-only">{t('open_menu')}</span>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end" className="w-[160px]">
                    {hasPermission('property_status.update') && (
                        <>
                            <DropdownMenuItem onClick={() => handleAction(status.original, 'edit')}>{t('edit_status')}</DropdownMenuItem>
                            <DropdownMenuSeparator/>
                        </>
                    )}
                    {hasPermission('property_status.delete') && (
                        <DropdownMenuItem className="text-red-500" onClick={() => handleAction(status.original, 'delete')}>
                            {t('delete_status')}
                            <DropdownMenuShortcut>⌘⌫</DropdownMenuShortcut>
                        </DropdownMenuItem>
                    )}
                </DropdownMenuContent>
            </DropdownMenu>
            <div className="flex items-center justify-end">
                {selectedStatus && selectedAction === 'edit' && (
                    <EditStatus status={selectedStatus} isOpen={true} closeModal={() => setSelectedStatus(undefined)}/>
                )}
                {selectedStatus && selectedAction === 'delete' && (
                    <DeleteStatus status={selectedStatus} isOpen={true} closeModal={() => setSelectedStatus(undefined)}/>
                )}
            </div>
        </>
    );
}
