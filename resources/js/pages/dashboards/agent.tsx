import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { MapPinHouse, House } from 'lucide-react';
import DashboardCard from './dashboard-card';
import { UserDashboardData } from './data';
import { DataTable } from '@/components/data-table/data-table';
import { ColumnDef } from '@tanstack/react-table';
import { PropertyColumns } from '@/modules/Property/resources/list/columns';
import { PropertyList } from '@/modules/Property/resources/list/data';
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({ properties }: {properties: UserDashboardData }) {
    const {t} = useTranslation('Main');
    const propertyColumns: ColumnDef<PropertyList>[] = PropertyColumns('en');
    
    return (
          <AppLayout breadcrumbs={breadcrumbs}>   
                 <Head title="Dashboard" />
                 <div className="grid grid-cols-2 sm:grid-cols-2 gap-4 rounded-xl p-4">
                    <DashboardCard IconNode={MapPinHouse} number={properties.total?.toString() || '0'} title={t('total_properties')} />
                    <DashboardCard IconNode={House} number={properties.total_active?.toString() || '0'} title={t('active_properties')} />
                 </div>

                 <div className="grid grid-cols-1 md:grid-cols-1 gap-4 rounded-xl p-4">
                <Card>
                    <CardHeader>
                        <div className="flex items-center justify-between">
                            <div>
                                <CardTitle>{t('properties')}</CardTitle>
                            </div>
                        </div>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        
                    <DataTable urlPath={route('property.load')} columns={propertyColumns}>
                                  <></>
                          </DataTable>
                    </CardContent>
                </Card>
                </div>

             </AppLayout >
    );
}
