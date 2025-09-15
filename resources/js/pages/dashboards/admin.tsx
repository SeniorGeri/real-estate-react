import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { UserDashboardData } from './data';
import { useTranslation } from 'react-i18next';
import DashboardCard from './dashboard-card';
import { House, MapPinHouse, User, UserCheck } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { DataTable } from '@/components/data-table/data-table';
import { ColumnDef } from '@tanstack/react-table';
import { AgentColumns } from '@/modules/Hrm/resources/agents/columns';
import { Agent } from '@/modules/Hrm/resources/agents/data';
import { PropertyColumns } from '@/modules/Property/resources/list/columns';
import { PropertyList } from '@/modules/Property/resources/list/data';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({agents, properties}: { agents: UserDashboardData, properties: UserDashboardData }) {
    const {t} = useTranslation('Main');

    
        const agentColumns: ColumnDef<Agent>[] = AgentColumns();
        const propertyColumns: ColumnDef<PropertyList>[] = PropertyColumns('en');
    return (
        <AppLayout breadcrumbs={breadcrumbs}>   
            <Head title="Dashboard" />
            <div className="grid grid-cols-2 md:grid-cols-4 gap-4 rounded-xl p-4">
               <DashboardCard IconNode={User} number={agents.total.toString()} title={t('total_agents')} />
               <DashboardCard IconNode={UserCheck} number={agents.total_active.toString()} title={t('active_agents')} />
               <DashboardCard IconNode={MapPinHouse} number={properties.total.toString()} title={t('total_properties')} />
               <DashboardCard IconNode={House} number={properties.total_active.toString()} title={t('active_properties')} />
            </div>

            <div className="grid grid-cols-1 xl:grid-cols-2 gap-4 rounded-xl p-4">
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

                <Card>
                    <CardHeader>
                        <div className="flex items-center justify-between">
                            <div>
                                <CardTitle>{t('agents')}</CardTitle>
                            </div>
                        </div>
                    </CardHeader>
                    <CardContent className="space-y-4">
                          <DataTable urlPath={route('agent.load')} columns={agentColumns}>
                                  <></>
                          </DataTable>
                    </CardContent>
                </Card>
            </div>
        </AppLayout >
    );
}
