'use client';

import { usePermissions } from '@/hooks/use-permissions';
import { ColumnDef } from '@tanstack/react-table';
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { PropertyColumns } from './columns';
import { Property } from './data';
import { PropertyActions } from './actions';
import { CreateProperty } from './create';
import { useLocale } from '@/contexts/locale';

export default function PropertyTable() {

    const { hasPermission } = usePermissions();
    const { currentLocale } = useLocale();

    const columns: ColumnDef<Property>[] = [
        ...PropertyColumns(currentLocale),
        {
            id: 'actions',
            cell: ({ row }) => <PropertyActions property={row} />
        }
    ];
    return (

        <DataTable urlPath={route('property.load')} columns={columns}>
            {hasPermission('property.create') && (
                <CreateProperty />
            )}

        </DataTable>

    );
}
