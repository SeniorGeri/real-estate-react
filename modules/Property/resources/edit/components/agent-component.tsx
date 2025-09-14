'use client';

import CustomSelect from '@/components/input/custom-select';
import { SelectItem } from '@/components/ui/select';
import { useTranslation } from 'react-i18next';
import { AgentProps } from '../props';
import { Agent } from '@/modules/Hrm/resources/agents/data';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';

export default function AgentComponent({ propertyData, setData, agents, errors }: AgentProps) {
    const { t } = useTranslation('Property');
 
    return (
            <Card>
                <CardHeader>
                    <div className="flex items-center justify-between">
                        <div>
                            <CardTitle>{t('agent')}</CardTitle>
                            <CardDescription>{t('agent_desc')}</CardDescription>
                        </div>
                    </div>
                </CardHeader>
                <CardContent className="space-y-4">
                    <div className="grid grid-cols-1 gap-4">
                        <CustomSelect
                            id="user_id"
                            placeholder={t('agent')}
                            text={
                                agents.find((count: Agent) => count.id?.toString() === propertyData.user_id?.toString())?.name ||
                                t('select_agent')
                            }
                            className="col-span-1 w-full"
                            errorMessage={errors?.property?.user_id}
                            value={propertyData.user_id?.toString()}
                            setFormData={setData}
                        >
                            <>
                                {agents.map((agent: Agent) => (
                                    <SelectItem key={agent.id} value={agent.id?.toString()}>
                                        {agent.name}
                                    </SelectItem>
                                ))}
                            </>
                        </CustomSelect>

                    </div>
                </CardContent>
            </Card>

    );
}