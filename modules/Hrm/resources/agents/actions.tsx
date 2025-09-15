'use client';

import {Button} from '@/components/ui/button';
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuSeparator, DropdownMenuShortcut, DropdownMenuTrigger} from '@/components/ui/dropdown-menu';
import {MoreHorizontal} from 'lucide-react';
import {useCallback, useState} from 'react';
import {Agent, AgentActionsProps} from "./data.js";
import {EditAgent} from "./edit.js";
import {DeleteAgent} from "./delete.js";
import { useTranslation } from 'react-i18next';
import { usePermissions } from '@/hooks/use-permissions.js';
import { router } from '@inertiajs/react';
import { ChangePassword } from './change-password.js';

export function AgentActions({agent}: AgentActionsProps) {

    const { t } = useTranslation('Hrm');

    const { hasPermission, hasAnyPermission} = usePermissions();

    const [selectedAgent, setSelectedAgent] = useState<Agent| undefined>(undefined);

    const [selectedAction, setSelectedAction] = useState<'edit' | 'delete' | 'change-password' | null>(null);

    const handleAction = useCallback((Agent: Agent, action: 'edit' | 'delete' | 'change-password') => {
        setTimeout(() => {
            setSelectedAgent(Agent);
            setSelectedAction(action);
        }, 10)
    }, []);

    if (!hasAnyPermission(['agent.update', 'agent.delete'])) {
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
                    {hasPermission('agent.update') && (
                        <>
                            <DropdownMenuItem onClick={() => handleAction(agent.original, 'edit')}>{t('edit_agent')}</DropdownMenuItem>
                            <DropdownMenuSeparator/>
                            <DropdownMenuItem onClick={() => handleAction(agent.original, 'change-password')}>{t('change_password')}</DropdownMenuItem>
                            <DropdownMenuSeparator/>
                        </>
                    )}
                    <DropdownMenuItem onClick={() =>  router.visit(route('agent.profile', agent.original.id))}>{t('profile_agent')}</DropdownMenuItem>
                    <DropdownMenuSeparator/>
                    
                    {hasPermission('agent.delete') && (
                        <DropdownMenuItem className="text-red-500" onClick={() => handleAction(agent.original, 'delete')}>
                            {t('delete_agent')}
                            <DropdownMenuShortcut>⌘⌫</DropdownMenuShortcut>
                        </DropdownMenuItem>
                    )}
                </DropdownMenuContent>
            </DropdownMenu>
            <div className="flex items-center justify-end">
                {selectedAgent && selectedAction === 'edit' && (
                    <EditAgent agent={selectedAgent} isOpen={true} closeModal={() => setSelectedAgent(undefined)}/>
                )}
                {selectedAgent && selectedAction === 'delete' && (
                    <DeleteAgent agent={selectedAgent} isOpen={true} closeModal={() => setSelectedAgent(undefined)}/>
                )}
                {selectedAgent && selectedAction === 'change-password' && (
                    <ChangePassword agent={selectedAgent} isOpen={true} closeModal={() => setSelectedAgent(undefined)}/>
                )}
            </div>
        </>
    );
}
