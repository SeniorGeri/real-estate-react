'use client';

import { TabsContent } from "@/components/ui/tabs";
import { useTranslation } from "react-i18next";
import { Agent } from "./data";
import { useLocale } from '@/contexts/locale';
import { ALargeSmall, Mail, Phone, MapPin,  Flag, UtilityPole, Mars, Venus, ShieldCheck, ShieldX } from "lucide-react";

export default function MainTab({ agent }: { agent: Agent }) {
    const {t} = useTranslation('Hrm');
    const { currentLocale } = useLocale();

    return (
        <TabsContent value="main" className="space-y-6">
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-4">
                    <h3 className="text-md font-semibold dark:text-white">{t('personalInformation')}</h3>
                    <div className="space-y-3">
                    <div className="grid sm:grid-cols-1 md:grid-cols-2 gap-4 pt-4">

                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2"><ALargeSmall className="h-4 w-4" />  {agent.name}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2"><Mail className="h-4 w-4" />  {agent.email}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2"><Phone className="h-4 w-4" />  {agent.phone}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2"><MapPin className="h-4 w-4" />  {agent.address}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2"><Flag className="h-4 w-4" />  {agent.country?.country[currentLocale]}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2"><UtilityPole className="h-4 w-4" />  {agent.city?.city[currentLocale]}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2">{agent.gender_id === 1 ? <Mars className="h-4 w-4" /> : <Venus className="h-4 w-4" />}  {agent.gender?.gender[currentLocale]}</p>
                            </div>
                            <div>
                                <p className="text-sm dark:text-white flex items-center gap-2">{agent.active === true ? <ShieldCheck className="h-4 w-4" /> : <ShieldX className="h-4 w-4" />}{agent.active === true ? t('active') : t('innactive')}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="space-y-2">
                <h3 className="text-md font-semibold dark:text-white">{t('bio')}</h3>
                    <p className="text-sm dark:text-white">{agent.bio[currentLocale]}</p>
                    <div className="grid grid-cols-2 gap-4 pt-4">
                        <div className="text-center p-4 bg-gray-50 dark:bg-green-900 rounded-lg">
                            <p className="text-2xl font-bold text-gray-900 dark:text-white">{agent.properties_count}</p>
                            <p className="text-sm text-gray-600 dark:text-gray-300">{t('properties')}</p>
                        </div>
                        <div className="text-center p-4 bg-gray-50 dark:bg-green-900 rounded-lg">
                            <p className="text-2xl font-bold text-gray-900 dark:text-white">{agent.active_properties}</p>
                            <p className="text-sm text-gray-600 dark:text-gray-300">{t('active_properties')}</p>
                        </div>
                    </div>
                </div>
            </div>
        </TabsContent>
    );
}
