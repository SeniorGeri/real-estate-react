'use client';

import {DataTableColumnHeader} from '@/components/data-table/data-table-column-header';
import {ColumnDef} from '@tanstack/react-table';
import {Zone} from "./data";
import {useTranslation} from 'react-i18next';
import { TranslatableField } from '@/types/helpers';



export const ZoneColumns = (currentLocale :string): ColumnDef<Zone>[] => {
    const { t } = useTranslation('Settings');

    return [
        {
            accessorKey: 'NR',
            header: () => t('nr'),
            cell: ({row, table}) => {
                return (
                    <div className="flex space-x-2 px-4">
                        <span className="max-w-[50px] truncate font-light">
                            {row.index + 1 + table.getState().pagination.pageIndex * table.getState().pagination.pageSize}
                        </span>
                    </div>
                );
            },
        },
        {
            accessorKey: 'name',
            header: ({column}) => <DataTableColumnHeader column={column} title={t('name')}/>,
            cell: ({row}) => {
                const name : TranslatableField = row.getValue('name')
                return (
                    <div className="flex space-x-2">
                        <span className="max-w-[500px] truncate font-light">{name[currentLocale] || t('not_translated')}</span>
                    </div>
                );
            },
            enableColumnFilter: true,
            enableSorting: true,
        },
        {

            accessorKey: 'city',
            header: ({column}) => <DataTableColumnHeader column={column} title={t('city')}/>,
            cell: ({row}) => {

                if( row.getValue('city')){
                    const city: TranslatableField = row.getValue('city')?.city
                    return (
                        <div className="flex space-x-2">
                            <span className="max-w-[500px] truncate font-light">{city[currentLocale] || t('not_translated')}</span>
                        </div>
                    );
                }  
               else {
                    return ('-')
               }
              
            },
            enableColumnFilter: true,
            enableSorting: true,
        },
        {
            accessorKey: 'description',
            header: ({column}) => <DataTableColumnHeader column={column} title={t('description')}/>,
            cell: ({row}) => {
                return (
                    <div className="flex space-x-2">
                        <span className="max-w-[500px] truncate font-light">{row.getValue('description')}</span>
                    </div>
                );
            },
            enableColumnFilter: true,
            enableSorting: false,
        },
    ];
}
