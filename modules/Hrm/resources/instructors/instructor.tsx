'use client';

import { usePermissions } from '@/hooks/use-permissions';
import { ColumnDef } from '@tanstack/react-table';
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { CreateAgent } from './create';
import { AgentColumns } from './columns';
import { Agent } from './data';
import { AgentActions } from './actions';

export default function AgentTable() {

    const { hasPermission } = usePermissions();

    const columns: ColumnDef<Agent>[] = [
        ...AgentColumns(),
        {
            id: 'actions',
            cell: ({ row }) => <AgentActions agent={row} />
        }
    ];
    return (

        <DataTable urlPath={route('agent.load')} columns={columns}>
            {hasPermission('agent.create') && (
                <CreateAgent/>
            )}

        </DataTable>

    );
}
