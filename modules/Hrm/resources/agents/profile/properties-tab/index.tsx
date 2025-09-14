'use client';

import { TabsContent } from "@/components/ui/tabs";
import { Agent } from "../data";
import { DataTable } from '@/components/data-table/data-table';
import { route } from 'ziggy-js';
import { PropertyColumns } from './columns';
import { PropertyList } from './data';
import { PropertyActions } from './actions';
import { useLocale } from '@/contexts/locale';
import { ColumnDef } from "@tanstack/react-table";


export default function PropertiesTab({ agent }: { agent: Agent }) {
    const { currentLocale } = useLocale();

    const columns: ColumnDef<PropertyList>[] = [
        ...PropertyColumns(currentLocale),
        {
            id: 'actions',
            cell: ({ row }) => <PropertyActions property={row} />
        }
    ];

    return (
        <TabsContent value="properties" className="space-y-6">
              <DataTable urlPath={route('agent.property', agent.id)} columns={columns}>
                    <></>
                   </DataTable>
        </TabsContent>
    );
}
