import {Button} from '@/components/ui/button';
import {Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle} from '@/components/ui/dialog';
import {useForm} from '@inertiajs/react';
import {FormEventHandler} from 'react';
import {toast} from 'sonner';
import {EditActiveCourseProps} from "./data";
import {route} from "ziggy-js";
import { useTranslation } from 'react-i18next';
import CustomInput from '@/components/input/custom-input';

export function EditActiveCourse({activeCourse, isOpen, closeModal}: EditActiveCourseProps) {

    const { t } = useTranslation('Operational');

    const {data, setData, put, processing, reset, errors, clearErrors} = useForm({
        id: activeCourse?.id,
        value: activeCourse?.value,
        left: activeCourse?.left,
        liquidation_percentage: activeCourse?.liquidation_percentage,
        status_id: activeCourse?.status_id,
        description: activeCourse?.description,
    });

    const updateActiveCourse: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('active-course.update', activeCourse.id), {
            preserveScroll: true,
            onSuccess: () => updatedActiveCourse(),
            onError: (error) => toast(error.description, {position: 'top-right', duration: 2000}),
            onFinish: () => reset(),
        });
    };

    const updatedActiveCourse = () => {
        toast(t('active_course_edit_succ'), {position: 'top-right', duration: 2000});
        clearErrors();
        reset();
        closeModal();

    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent>
                <DialogTitle>{t('edit_active_course')}</DialogTitle>
                <DialogDescription>
                    {t('edit_active_course_desc')}
                </DialogDescription>

                <form className="space-y-6" onSubmit={updateActiveCourse}>

                    <CustomInput
                        id="value"
                        value={data.value}
                        setFormData={setData}
                        placeholder={t('value')}
                        errorMessage={errors.value}
                    />

                    <CustomInput
                        id="left"
                        value={data.left}
                        setFormData={setData}
                        placeholder={t('left')}
                        errorMessage={errors.left}
                    />

                    <CustomInput
                        id="liquidation_percentage"
                        value={data.liquidation_percentage}
                        setFormData={setData}
                        placeholder={t('liquidation_percentage')}
                        errorMessage={errors.liquidation_percentage}
                    />

                    <CustomInput
                        id="description"
                        value={data.description}
                        setFormData={setData}
                        placeholder={t('description')}
                        errorMessage={errors.description}
                    />
         
               

                    <DialogFooter className="gap-2">
                        <DialogClose asChild>
                            <Button variant="secondary" onClick={closeModal}>
                                {t('close')}
                            </Button>
                        </DialogClose>

                        <Button variant="default" disabled={processing} asChild>
                            <button type="submit">{t('edit_active_course')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
