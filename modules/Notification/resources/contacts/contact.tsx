'use client';


import { DataTable } from '@/components/data-table/data-table';
import { ColumnDef } from '@tanstack/react-table';
import { Contact } from './data';
import { ContactColumns } from './columns';
import { ContactActions } from './actions';
import { route } from 'ziggy-js';
import { useLocale } from '@/contexts/locale';

export default function ContactTable() {

    const { currentLocale } = useLocale();
    
    const columns: ColumnDef<Contact>[] = [
        ...ContactColumns(currentLocale),
        {
            id: 'actions',
            cell: ({ row }) => <ContactActions contact={row} />
        }
    ];

    return (
   
        <DataTable urlPath={route('contact.load')} columns={columns}>
            <></>
        </DataTable>
                
    );
}
