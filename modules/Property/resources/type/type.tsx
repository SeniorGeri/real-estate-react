'use client';

import { usePermissions } from '@/hooks/use-permissions';
import { ColumnDef } from '@tanstack/react-table';
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { TypeColumns } from './columns';
import { Type } from './data';
import { TypeActions } from './actions';
import { CreateType } from './create';
import { useLocale } from '@/contexts/locale';

export default function TypeTable() {

    const { hasPermission } = usePermissions();
    const { currentLocale } = useLocale();

    const columns: ColumnDef<Type>[] = [
        ...TypeColumns(currentLocale),
        {
            id: 'actions',
            cell: ({ row }) => <TypeActions type={row} />
        }
    ];
    return (

        <DataTable urlPath={route('property.type.load')} columns={columns}>
            {hasPermission('property_type.create') && (
                <CreateType />
            )}

        </DataTable>

    );
}
