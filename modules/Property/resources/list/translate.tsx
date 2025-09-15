import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import {FormEventHandler, useEffect} from 'react';
import {toast} from 'sonner';
import {route} from "ziggy-js";
import { useLocale } from '@/contexts/locale';
import { Languages } from '@/components/languages';
import { useTranslation } from 'react-i18next';
import CustomInput from '@/components/input/custom-input';
import {TranslatePropertyProps} from "./data";
import CustomTextEditor from '@/components/input/custom-text-editor';

export function TranslateProperty({property, isOpen, closeModal}: TranslatePropertyProps) {

    const { t } = useTranslation('Property');

    const { currentLocale } = useLocale();

    const {data, setData, put, processing, reset, errors, clearErrors} = useForm({
        id: property?.id,
        title: property?.title ? property?.title[currentLocale] : '',
        description: property?.description ? property?.description[currentLocale] : '',
        attributes: property?.property_attributes.map(attr => ({id: attr.id, attribute: attr.attribute[currentLocale] ?? '', value: attr.value[currentLocale] ?? ''})) ?? [],
        locale: currentLocale ?? null
    });

    // eslint-disable-next-line react-hooks/exhaustive-deps
    useEffect(() => {
        setData('title', property?.title[data.locale] || '');
        setData('description', property?.description[data.locale] || '');

        data.attributes.forEach(attr => {
            attr.attribute = property.property_attributes.find(a => a.id === attr.id)?.attribute[data.locale] ?? '';
            attr.value = property.property_attributes.find(a => a.id === attr.id)?.value[data.locale] ?? '';
        });
        setData('attributes', data.attributes);
    } , [data.locale]);

    const translateProperty: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('property.translate', property.id), {
            preserveScroll: true,
            onSuccess: () => translatedProperty(),
            onError: (error) => toast(error.description, {position: 'top-right', duration: 2000}),
            onFinish: () => reset(),
        });
    };

    const translatedProperty = () => {
        toast(t('property_trans_succ'), {position: 'top-right', duration: 2000});
        clearErrors();
        reset();
        closeModal();

    };

    const setAttrData = (key: string, value: string) => {
        const [keySelector, id]: ['attribute' | 'image' | 'value', string] = key.split('.') as ['attribute' | 'image' | 'value', string];

        setData('attributes', data.attributes.map(attr => attr.id === parseInt(id) ? {...attr, [keySelector]: value} : attr));
    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent className="sm:max-w-4xl">
                <DialogTitle>{t('translate_property')}</DialogTitle>
                <DialogDescription>
                    {t('translate_property_desc')}
                </DialogDescription>

                <form className="space-y-3" onSubmit={translateProperty}>
                    <Languages currentLocale={data.locale} setData={setData}/>

                     <CustomInput
                        id="title"
                        value={data.title}
                        setFormData={setData}
                        placeholder={t('title')}
                        errorMessage={errors.title}
                    />

                    {data.attributes.map((attr: {id: number, attribute: string, value: string}) => (
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <CustomInput key={`attribute.${attr.id}`} id={`attribute.${attr.id}`} value={attr.attribute} setFormData={setAttrData} 
                                placeholder={property.property_attributes.find(a => a.id === attr.id)?.attribute[currentLocale] ?? ''} />
                            <CustomInput key={`value.${attr.id}`} id={`value.${attr.id}`} value={attr.value} setFormData={setAttrData} 
                                placeholder={property.property_attributes.find(a => a.id === attr.id)?.value[currentLocale] ?? ''} />
                        </div>
                    ))}
                    <CustomTextEditor
                            id="description"
                            height={300}
                            setFormData={setData}
                            placeholder={t('description')}
                            defaultValue={data.description}
                            errorsMessage={errors?.description}
                        />

                    <DialogFooter className="gap-2">
                        <DialogClose asChild>
                            <Button variant="secondary" onClick={closeModal}>
                                {t('close')}
                            </Button>
                        </DialogClose>

                        <Button variant="default" disabled={processing} asChild>
                            <button type="submit">{t('translate_property')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
