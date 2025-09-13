'use client';

import { ColumnDef } from '@tanstack/react-table';
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { LiquidationColumns } from './columns';
import { Liquidation } from './data';
import { LiquidationActions } from './actions';

export default function LiquidationTable() {


    const columns: ColumnDef<Liquidation>[] = [
        ...LiquidationColumns(),
        {
            id: 'actions',
            cell: ({ row }) => <LiquidationActions liquidation={row} />
        }
    ];
    return (

        <DataTable urlPath={route('liquidation.load')} columns={columns}>
            <>  </>
        </DataTable>

    );
}
