'use client';

import {Button} from '@/components/ui/button';
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuSeparator, DropdownMenuShortcut, DropdownMenuTrigger} from '@/components/ui/dropdown-menu';
import {MoreHorizontal} from 'lucide-react';
import {useCallback, useState} from 'react';
import {PropertyList, PropertyActionsProps} from "./data.js";
import { useTranslation } from 'react-i18next';
import { usePermissions } from '@/hooks/use-permissions.js';
import { Link } from '@inertiajs/react';
import { DeleteProperty } from './delete.js';

export function PropertyActions({property}: PropertyActionsProps) {

    const { t } = useTranslation('Property');

    const { hasPermission, hasAnyPermission} = usePermissions();

    const [selectedProperty, setSelectedProperty] = useState<PropertyList| undefined>(undefined);

    const [selectedAction, setSelectedAction] = useState<'edit' | 'delete' | null>(null);

    const handleAction = useCallback((property: PropertyList, action: 'edit' | 'delete') => {
        setTimeout(() => {
            setSelectedProperty(property);
            setSelectedAction(action);
        }, 10)
    }, []);

    if (!hasAnyPermission(['property.update', 'property.delete'])) {
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
                    {hasPermission('property.update') && (
                        <>
                            <Link href={route('property.edit', property.original.id)}>
                                <DropdownMenuItem>{t('edit_property')}</DropdownMenuItem>
                            </Link>
                        </>
                    )}
                
                </DropdownMenuContent>
            </DropdownMenu>
        </>
    );
}
