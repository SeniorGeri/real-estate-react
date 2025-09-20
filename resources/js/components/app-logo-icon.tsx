import {    HTMLAttributes } from 'react';
import { vertical } from '@/assets/images';

export default function AppLogoIcon(props: HTMLAttributes<HTMLImageElement>) {
    return (
        <img {...props} src={vertical} />
    );
}
