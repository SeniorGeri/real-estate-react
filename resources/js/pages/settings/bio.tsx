import { type SharedData } from '@/types';
import { Transition } from '@headlessui/react';
import {  useForm, usePage } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import HeadingSmall from '@/components/heading-small';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import SettingsLayout from '@/layouts/settings/layout';
import { useLocale } from '@/contexts/locale';
import CustomTextarea from '@/components/input/custom-textarea';
import { Languages } from '@/components/languages';
import { useEffect } from 'react';
import { route } from 'ziggy-js';


type BioForm = {
    bio: string;
    locale: string;
}

export default function Bio() {
    const { auth } = usePage<SharedData>().props;
    const { currentLocale } = useLocale();
    console.log(auth.user.bio);

    const { data, setData, put, errors, processing, recentlySuccessful } = useForm<BioForm>({
        bio: auth.user.bio[currentLocale],
        locale: currentLocale ?? null
    });
    useEffect(() =>setData('bio', auth.user.bio[data.locale] || '') , [data.locale]);
    
    
    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        put(route('bio.update'), {
            preserveScroll: true,
        });
    };

    return (
        <SettingsLayout>
            <div className="space-y-2">
                <HeadingSmall title="Profile information" description="Update your name and email address" />

                <form onSubmit={submit} className="space-y-2">

                    <div className="grid gap-2">
                    <Languages currentLocale={data.locale} setData={setData}/>

                        <CustomTextarea
                            id="bio"
                            value={data.bio}
                            setFormData={setData}
                            placeholder="Bio"
                        />
                        <InputError className="mt-2" message={errors.bio} />
                    </div>

                    <div className="flex items-center gap-4">
                        <Button disabled={processing} className="w-full">Save</Button>

                        <Transition
                            show={recentlySuccessful}
                            enter="transition ease-in-out"
                            enterFrom="opacity-0"
                            leave="transition ease-in-out"
                            leaveTo="opacity-0"
                        >
                            <p className="text-sm text-neutral-600">Saved</p>
                        </Transition>
                    </div>
                </form>
            </div>

        </SettingsLayout>

    );
}
