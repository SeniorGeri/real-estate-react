import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { GripVertical, Trash2 } from 'lucide-react';

export function ImageCard({ image, index, onRemove }: { image: string; index: number; onRemove: () => void }) {
    return (
        <div className="group relative overflow-hidden rounded-lg border">
            <div className="absolute top-2 right-2 z-10 opacity-0 transition-opacity group-hover:opacity-100">
                <div className="cursor-grab rounded bg-black/60 p-1 active:cursor-grabbing">
                    <GripVertical className="h-4 w-4 text-white" />
                </div>
            </div>
            <img src={image} alt={`Product image ${index + 1}`} className="pointer-events-none h-48 w-full object-cover" />
            <div className="absolute inset-0 flex items-center justify-center gap-2 bg-black/60 opacity-0 transition-opacity group-hover:opacity-100">
                <Button size="sm" type="button" variant="outline" className="h-8 w-8 p-0" onClick={onRemove}>
                    <Trash2 className="h-4 w-4" />
                </Button>
            </div>
            {index === 0 && <Badge className="absolute top-2 left-2 z-10">Featured</Badge>}
            {index === 1 && <Badge className="absolute top-2 left-2 z-10">Hover</Badge>}
        </div>
    );
}