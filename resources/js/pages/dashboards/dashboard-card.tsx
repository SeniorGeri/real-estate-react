import { Card } from "@/components/ui/card";

export default function DashboardCard ({ IconNode, number, title }: { IconNode: React.ElementType, number: string, title: string }) {
    return (

    <Card  className="p-6">
        <div className="flex items-center justify-evenly gap-4">
                <div className="p-2 bg-blue-50 rounded-lg">
                    <IconNode className="text-gray-600" />
                </div>
                <h3 className="text-sm font-medium text-gray-600 dark:text-white uppercase tracking-wide">
                {title}
                </h3>
                <p className="text-2xl font-bold text-gray-900 dark:text-white">{number}</p>

        </div>
    </Card>

);
}
