'use client';

import { usePermissions } from '@/hooks/use-permissions';
import { ColumnDef } from '@tanstack/react-table';
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { StatusColumns } from './columns';
import { Status } from './data';
import { StatusActions } from './actions';
import { CreateStatus } from './create';
import { useLocale } from '@/contexts/locale';

export default function StatusTable() {

    const { hasPermission } = usePermissions();
    const { currentLocale } = useLocale();

    const columns: ColumnDef<Status>[] = [
        ...StatusColumns(currentLocale),
        {
            id: 'actions',
            cell: ({ row }) => <StatusActions status={row} />
        }
    ];
    return (

        <DataTable urlPath={route('property.status.load')} columns={columns}>
            {hasPermission('property_status.create') && (
                <CreateStatus />
            )}

        </DataTable>

    );
}
