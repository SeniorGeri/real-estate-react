'use client';

import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { useTranslation } from 'react-i18next';
import { ImagesProps } from '../../props';
import { ImageCard } from './image-card';
import FileInput from '@/modules/Media/resources/js/file-input';
import { DraggableList } from '@/components/draggable/list';

export default function Images({ images, setData }: ImagesProps) {
    const { t } = useTranslation('Property');
    const setImage = (key: 'gallery', value: string) => {
        if (!value || images.find((image: string) => image === value)) return;
        setData(key, [...images, value]);
    };

    const removeImage = (image: string) => {
        setData(
            'gallery',
            images.filter((currentImage: string) => currentImage !== image),
        );
    };
    return (
        <Card>
            <CardHeader>
                <CardTitle>{t('images')}</CardTitle>
                <CardDescription>{t('images_desc')}</CardDescription>
            </CardHeader>
            <CardContent>
                <div className="grid grid-cols-1 gap-4 md:grid-cols-4">
                    <DraggableList
                        items={images}
                        onReorder={(newImages: string[]) => setData('gallery', newImages)}
                        getKey={(image: string, index: number) => `${image}-${index}`}
                        renderItem={(image: string, index: number) => (
                            <ImageCard image={image} index={index} onRemove={() => removeImage(image)} />
                        )}
                    />
                    <FileInput inputName="gallery" setFormData={setImage} />
                </div>
            </CardContent>
        </Card>
    );
}