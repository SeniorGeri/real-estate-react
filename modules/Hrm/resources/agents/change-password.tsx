import { Button } from '@/components/ui/button';
import { Dialog, DialogClose, DialogContent, DialogDescription, DialogFooter, DialogTitle } from '@/components/ui/dialog';
import { useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import { toast } from 'sonner';
import { EditAgentProps } from "./data";
import { route } from "ziggy-js";
import { useTranslation } from 'react-i18next';
import CustomInput from '@/components/input/custom-input';

export function ChangePassword({ agent, isOpen, closeModal }: EditAgentProps) {

    const { t } = useTranslation('Hrm');

    const { data, setData, put, processing, reset, errors, clearErrors } = useForm({
        id: agent?.id,
        password: '',
        password_confirmation: '',

    });

    const updateAgent: FormEventHandler = (e) => {
        e.preventDefault();
        put(route('agent.password', agent.id), {
            preserveScroll: true,
            onSuccess: () => updatedAgent(),
            onError: (error) => toast(error.password || error.password_confirmation, { position: 'top-right', duration: 2000 }),

        });
    };

    const updatedAgent = () => {
        toast(t('agent_change_password_succ'), { position: 'top-right', duration: 2000 });
        clearErrors();
        reset();
        closeModal();
    };

    return (
        <Dialog open={isOpen} modal={true}>
            <DialogContent>
                <DialogTitle>{t('change_password')}</DialogTitle>
                <DialogDescription>
                    {t('change_password_desc')}
                </DialogDescription>

                <form className="space-y-6" onSubmit={updateAgent}>

                        <CustomInput
                            id="password"
                            type="password"
                            value={data.password}
                            setFormData={setData}
                            placeholder={t('password')}
                            errorMessage={errors.password}
                            className='col-span-1'
                        />

                        <CustomInput
                            id="password_confirmation"
                            type="password"
                            value={data.password_confirmation}
                            setFormData={setData}
                            placeholder={t('password_confirmation')}
                            errorMessage={errors.password_confirmation}
                            className='col-span-1'
                        />

                    <DialogFooter className="gap-2">
                        <DialogClose asChild>
                            <Button variant="secondary" onClick={closeModal}>
                                {t('close')}
                            </Button>
                        </DialogClose>

                        <Button variant="default" disabled={processing} asChild>
                            <button type="submit">{t('change_password')}</button>
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
