'use client';

import { Card } from "@/components/ui/card";
import { CardContent } from "@/components/ui/card"
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
import { Mail, MapPin, Calendar } from "lucide-react"
import { useTranslation } from "react-i18next";
import { Agent } from "./data";
import { useLocale } from "@/contexts/locale";
import { Badge } from "@/components/ui/badge";

export default function Header({ agent }: { agent: Agent }) {
    const {t} = useTranslation('Hrm');
    const { currentLocale } = useLocale();

    return (
        <Card className="mb-8 overflow-hidden border shadow-sm dark:bg-stone-950 dark:border-green-900">
            <CardContent className="relative p-4">
                <div className="flex flex-col items-center sm:flex-row sm:items-end sm:space-x-6">
                    <Avatar className="h-28 w-28 -mt-14 border-4 border-white shadow-lg">
                        <AvatarImage src={agent.profile_pic || "/placeholder.svg"} alt={agent.name} />
                        <AvatarFallback className="text-xl font-semibold bg-gray-600 dark:bg-gray-500 text-white">
                            {agent.name
                                .split(" ")
                                .map((n) => n[0])
                                .join("")}
                        </AvatarFallback>
                    </Avatar>
                    <div className="flex-1 text-center sm:text-left mt-4 sm:mt-0">
                        <h1 className="text-3xl font-bold text-gray-900 dark:text-white">{agent.name}</h1>
                        <p className="text-gray-600 dark:text-gray-300 mt-1">{agent.bio[currentLocale]}</p>
                        <div className="flex flex-wrap justify-center sm:justify-start gap-4 mt-4 text-sm text-gray-500 dark:text-gray-400">
                            <div className="flex items-center gap-1">
                                <Mail className="h-4 w-4" />
                                {agent.email}
                            </div>
                            <div className="flex items-center gap-1">
                                <MapPin className="h-4 w-4" />
                                {agent.address}
                            </div>
                            <div className="flex items-center gap-1">
                                <Calendar className="h-4 w-4" />
                                {t('joined')} {new Date(agent.created_at).toLocaleDateString()}
                            </div>
                        </div>
                    </div>
                    <div className="flex gap-2 mt-4 sm:mt-0">
                        <Badge variant={agent.active === true ? 'default' : 'secondary'}>
                            {agent.active === true ? 'Active' : 'Inactive'}
                        </Badge>
                    </div>
                </div>
            </CardContent>
        </Card>
    );
}
