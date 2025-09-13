'use client';

import {DataTableColumnHeader} from '@/components/data-table/data-table-column-header';
import {ColumnDef} from '@tanstack/react-table';
import {CourseInstructor} from "./data";
import { useTranslation } from 'react-i18next';
import { Course } from '@/modules/Operational/resources/courses/data';
import { InertiaLangPageProps } from '@/types/helpers';
import { usePage } from '@inertiajs/react';
import { Instructor } from '@/modules/Hrm/resources/instructors/data';


export const CourseInstructorColumns = (): ColumnDef<CourseInstructor>[] => {
    const { t } = useTranslation('Operational');
        const { languages } = usePage<InertiaLangPageProps>().props;
    

    return [
        {
            accessorKey: 'NR',
            header: () => t('nr'),
            cell: ({row, table}) => {
                console.log(row);
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
            accessorKey: 'course',
            header: ({column}) => <DataTableColumnHeader column={column} title={t('course')}/>,
            cell: ({row}) => {
                const course : Course = row.getValue('course')
                return (
                    <div className="flex space-x-2">
                        <span className="max-w-[500px] truncate font-light">{course.title[languages.main]}</span>
                    </div>
                );
            },
            enableColumnFilter: true,
            enableSorting: true,
        },
        {
            accessorKey: 'instructor',
            header: ({column}) => <DataTableColumnHeader column={column} title={t('instructor')}/>,
            cell: ({row}) => {
                const instructor : Instructor = row.getValue('instructor')
                return (
                    <div className="flex space-x-2">
                        <span className="max-w-[500px] truncate font-light">{instructor.name}</span>
                    </div>
                );
            },
            enableColumnFilter: true,
            enableSorting: true,
        },
        {
            accessorKey: 'price',
            header: ({column}) => <DataTableColumnHeader column={column} title={t('price')}/>,
            cell: ({row}) => {
                return (
                    <div className="flex space-x-2">
                        <span className="max-w-[500px] truncate font-light">{row.getValue('price')}</span>
                    </div>
                );
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
