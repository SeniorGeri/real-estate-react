'use client';

import {Button} from '@/components/ui/button';
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuSeparator, DropdownMenuShortcut, DropdownMenuTrigger} from '@/components/ui/dropdown-menu';
import {MoreHorizontal} from 'lucide-react';
import {useCallback, useState} from 'react';
import {Type, TypeActionsProps} from "./data.js";
import {EditType} from "./edit.js";
import {DeleteType} from "./delete.js";
import { useTranslation } from 'react-i18next';
import { usePermissions } from '@/hooks/use-permissions.js';

export function TypeActions({type}: TypeActionsProps) {

    const { t } = useTranslation('Property');

    const { hasPermission, hasAnyPermission} = usePermissions();

    const [selectedType, setSelectedType] = useState<Type| undefined>(undefined);

    const [selectedAction, setSelectedAction] = useState<'edit' | 'delete' | null>(null);

    const handleAction = useCallback((type: Type, action: 'edit' | 'delete') => {
        setTimeout(() => {
            setSelectedType(type);
            setSelectedAction(action);
        }, 10)
    }, []);

    if (!hasAnyPermission(['property_type.update', 'property_type.delete'])) {
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
                    {hasPermission('property_type.update') && (
                        <>
                            <DropdownMenuItem onClick={() => handleAction(type.original, 'edit')}>{t('edit_type')}</DropdownMenuItem>
                            <DropdownMenuSeparator/>
                        </>
                    )}
                    {hasPermission('property_type.delete') && (
                        <DropdownMenuItem className="text-red-500" onClick={() => handleAction(type.original, 'delete')}>
                            {t('delete_type')}
                            <DropdownMenuShortcut>⌘⌫</DropdownMenuShortcut>
                        </DropdownMenuItem>
                    )}
                </DropdownMenuContent>
            </DropdownMenu>
            <div className="flex items-center justify-end">
                {selectedType && selectedAction === 'edit' && (
                    <EditType type={selectedType} isOpen={true} closeModal={() => setSelectedType(undefined)}/>
                )}
                {selectedType && selectedAction === 'delete' && (
                    <DeleteType type={selectedType} isOpen={true} closeModal={() => setSelectedType(undefined)}/>
                )}
            </div>
        </>
    );
}
