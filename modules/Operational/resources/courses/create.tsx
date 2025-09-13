'use client';

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { courseBreadcrumbs } from './data';
import { usePage } from '@inertiajs/react';
import { InertiaLangPageProps } from '@/types/helpers';
import CustomTextarea from '@/components/input/custom-textarea';
import { CustomMultiSelect } from '@/components/input/custom-multi-select';
import CustomInput from '@/components/input/custom-input';
import { FormEventHandler } from 'react';
import { useTranslation } from 'react-i18next';
import { useForm } from '@inertiajs/react';
import { Subject } from '../subjects/data';
import { Grade } from '../grades/data';
import { School } from '../schools/data';
import FileInput from '../../../Media/resources/js/file-input';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { toast } from 'sonner';

export default function CreateCourse({ schools, subjects, grades }: { schools: School[], subjects: Subject[], grades: Grade[] }) {
    const { t } = useTranslation('Operational');

    const { languages } = usePage<InertiaLangPageProps>().props;

    const { data, setData, post, processing, errors } = useForm({
        image: '',
        title: '',
        description: '',
        schools: [],
        subjects: [],
        grades: [],

    });


    const storeCourseCreateCourse: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('course.store'), {
            preserveScroll: true,
            onSuccess: () => toast(t('course_created_succ'), {position: 'top-right', duration: 2000}),
        });
    };
    return (
            <AppLayout breadcrumbs={courseBreadcrumbs}>
                <Head title="Courses" />
                <div className="flex flex-col gap-2 p-4 ">
                    <Card>
                        <CardHeader>
                            <CardTitle>{t('create_course')}</CardTitle>
                            <CardDescription>{t('create_course_desc')}</CardDescription>
                        </CardHeader>

                        <CardContent>
                            <form className="space-y-6" onSubmit={storeCourseCreateCourse}>

                                <CustomInput
                                    id="title"
                                    value={data.title}
                                    setFormData={setData}
                                    placeholder={t('title')}
                                    errorMessage={errors.title}
                                />


                                <div className="grid grid-cols-1 md:grid-cols-3 gap-2">
                                    <CustomMultiSelect
                                        id="schools"
                                        selected={data.schools}
                                        onChange={(selected) => setData('schools', selected)}
                                        placeholder={t('schools')}
                                        options={schools.map((school) => { return { value: school.id, label: school.title[languages.main] } })}
                                    />

                                    <CustomMultiSelect
                                        id="subjects"
                                        selected={data.subjects}
                                        onChange={(selected) => setData('subjects', selected)}
                                        placeholder={t('subjects')}
                                        options={subjects.map((subject) => { return { value: subject.id, label: subject.title[languages.main] } })}
                                    />

                                    <CustomMultiSelect
                                        id="grades"
                                        selected={data.grades}
                                        onChange={(selected) => setData('grades', selected)}
                                        placeholder={t('grades')}
                                        options={grades.map((grade) => { return { value: grade.id, label: grade.title[languages.main] } })}
                                    />
                                </div>
                                <CustomTextarea
                                        className="col-span-2"
                                        id="description"
                                        value={data.description}
                                        setFormData={setData}
                                        placeholder={t('description')}
                                        errorMessage={errors.description}
                                    />

                                <div className="grid grid-cols-1 md:grid-cols-2 gap-2">
                            
                                    <FileInput inputName='image' setFormData={setData} />
                                    <div className="flex justify-end items-end">
                                        <Button variant="default" disabled={processing} size="sm" type="submit">
                                            {t('create_course')}
                                        </Button>
                                    </div>
                                </div>
                            

                        
                            </form>
                        </CardContent>
                    </Card>
                </div>
            </AppLayout>
    );
}
