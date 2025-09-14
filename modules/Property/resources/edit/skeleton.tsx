import { Card, CardContent, CardHeader } from '@/components/ui/card';
import { Skeleton } from '@/components/ui/skeleton';

export default function FormSkeleton() {
    return (
        <div className="space-y-6">
            <div className="bg-background sticky top-0 z-30 flex items-center justify-between pt-2 pb-4">
                <div className="flex items-center gap-2">
                    <Skeleton className="h-9 w-20" />
                    <Skeleton className="h-4 w-36" />
                </div>

                <div className="flex items-center gap-2">
                    <Skeleton className="h-9 w-20" />
                    <Skeleton className="h-9 w-32" />
                </div>
            </div>

            <Skeleton className="h-10 w-full" />

            <Card>
                <CardHeader>
                    <Skeleton className="mb-2 h-6 w-48" />
                    <Skeleton className="h-4 w-72" />
                </CardHeader>
                <CardContent className="space-y-4">
                    <Skeleton className="h-10 w-full" />
                    <Skeleton className="h-20 w-full" />
                    <Skeleton className="h-32 w-full" />
                </CardContent>
            </Card>
        </div>
    );
}