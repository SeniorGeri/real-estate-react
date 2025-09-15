import { Head, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';
import { Button } from '@/components/ui/button';
import AuthLayout from '@/layouts/auth-layout';
import { LoginForm } from './data';
import CustomInput from '@/components/input/custom-input';
import { useTranslation } from 'react-i18next'; 

export default function Login() {
    const { t } = useTranslation('Auth');

    const { data, setData, post, processing, errors, reset } = useForm<Required<LoginForm>>({
        email: '',
        password: '',
        remember: false,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return (
        <AuthLayout title={t('login')} description={t('login_desc')}>
            <Head title={t('login')} />

            <form className="flex flex-col gap-6" onSubmit={submit}>
                <div className="grid gap-6">
                    <CustomInput
                        id="email"
                        type="email"
                        placeholder={t('email')}
                        value={data.email}
                        setFormData={setData}
                        errorMessage={errors.email}
                    />

                    <CustomInput
                        id="password"
                        type="password"
                        placeholder={t('password')}
                        value={data.password}
                        setFormData={setData}
                        errorMessage={errors.password}
                    />
      
                    <Button type="submit" className="mt-4 w-full" tabIndex={4} disabled={processing}>
                        {processing && <LoaderCircle className="h-4 w-4 animate-spin" />}
                        {t('login')}
                    </Button>
                </div>

            </form>
        </AuthLayout>
    );
}
