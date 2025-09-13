'use client';

import { usePermissions } from '@/hooks/use-permissions';
import { ColumnDef } from '@tanstack/react-table';
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { ZoneColumns } from './columns';
import { Zone } from './data';
import { ZoneActions } from './actions';
import { useLocale } from '@/contexts/locale';
import { CreateZone } from './create';

export default function ZoneTable() {

    const { hasPermission } = usePermissions();
    const { currentLocale } = useLocale();

    const columns: ColumnDef<Zone>[] = [
        ...ZoneColumns(currentLocale),
        {
            id: 'actions',
            cell: ({ row }) => <ZoneActions zone={row} />
        }
    ];
    return (

        <DataTable urlPath={route('zone.load')} columns={columns}>
            {hasPermission('zone.create') && (
                <CreateZone/>
            )}

        </DataTable>

    );
}
