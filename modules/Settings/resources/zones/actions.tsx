'use client';

import {Button} from '@/components/ui/button';
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuSeparator, DropdownMenuShortcut, DropdownMenuTrigger} from '@/components/ui/dropdown-menu';
import {MoreHorizontal} from 'lucide-react';
import {useCallback, useState} from 'react';
import {Zone, ZoneActionsProps} from "./data.js";
import {EditZone} from "./edit.js";
import {DeleteZone} from "./delete.js";
import { useTranslation } from 'react-i18next';
import { usePermissions } from '@/hooks/use-permissions';

export function ZoneActions({zone}: ZoneActionsProps) {

    const { t } = useTranslation('Settings');

    const { hasPermission, hasAnyPermission} = usePermissions();

    const [selectedZone, setSelectedZone] = useState<Zone| undefined>(undefined);

    const [selectedAction, setSelectedAction] = useState<'edit' | 'delete' | null>(null);

    const handleAction = useCallback((zone: Zone, action: 'edit' | 'delete') => {
        setTimeout(() => {
            setSelectedZone(zone);
            setSelectedAction(action);
        }, 10)
    }, []);

    if (!hasAnyPermission(['zone.update', 'zone.delete'])) {
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
                    {hasPermission('zone.update') && (
                        <>
                        <DropdownMenuItem onClick={() => handleAction(zone.original, 'edit')}>{t('edit_zone')}</DropdownMenuItem>
                        <DropdownMenuSeparator/>
                        </>
                    )}

                    {hasPermission('zone.delete') && (
                        <DropdownMenuItem className="text-red-500" onClick={() => handleAction(zone.original, 'delete')}>
                            {t('delete_zone')}
                            <DropdownMenuShortcut>⌘⌫</DropdownMenuShortcut>
                        </DropdownMenuItem>
                    )}
                </DropdownMenuContent>
            </DropdownMenu>
            <div className="flex items-center justify-end">
                {selectedZone && selectedAction === 'edit' && (
                    <EditZone zone={selectedZone} isOpen={true} closeModal={() => setSelectedZone(undefined)}/>
                )}
                {selectedZone && selectedAction === 'delete' && (
                    <DeleteZone zone={selectedZone} isOpen={true} closeModal={() => setSelectedZone(undefined)}/>
                )}
            </div>
        </>
    );
}
