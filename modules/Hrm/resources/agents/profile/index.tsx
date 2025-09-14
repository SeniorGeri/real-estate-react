'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { agentBreadcrumbs } from '../data';
import { Agent } from './data';
import { Card, CardContent, CardHeader } from "@/components/ui/card"
import { Tabs, TabsList, TabsTrigger } from "@/components/ui/tabs"
import {
  User,
  Building,
} from "lucide-react"
import Header from './header';
import MainTab from './main-tab';
import { useTranslation } from 'react-i18next';
import PropertiesTab from './properties-tab';

export default function AgentProfile({ agent }:   { agent: Agent }) {

  const {t} = useTranslation('Hrm');

  return (
    <AppLayout breadcrumbs={agentBreadcrumbs}>
      <Head title="Agents" />
      <div className="gap-2 p-4 ">
        <div className="min-h-screen bg-gray-50 dark:bg-stone-950 p-4">
          <div className="mx-auto max-w-6xl">
            {/* Profile Header */}
            <Header agent={agent} />

            {/* Tabs Section */}
            <Card className="border shadow-sm dark:bg-stone-950 dark:border-green-900">
              <Tabs defaultValue="main" className="w-full">
                <CardHeader className="pb-4">
                  <TabsList className="grid w-full grid-cols-2 bg-gray-50 dark:bg-green-900">
                    <TabsTrigger value="main" className="flex items-center gap-2">
                      <User className="h-4 w-4" />
                      {t('mainData')}
                    </TabsTrigger>
           
                    <TabsTrigger value="properties" className="flex items-center gap-2">
                      <Building className="h-4 w-4" />
                      {t('properties')}
                    </TabsTrigger>
                    
                  </TabsList>
                </CardHeader>

                <CardContent className="pt-0">
                  <MainTab agent={agent} />
                  <PropertiesTab agent={agent} />
                </CardContent>
              </Tabs>
            </Card>
          </div>
        </div>
      </div>
    </AppLayout>
  );
}
