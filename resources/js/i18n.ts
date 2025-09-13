import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';

import EnSettings from '../../modules/Settings/lang/en.json';
import EnHrm from '../../modules/Hrm/lang/en.json'
import EnMedia from '../../modules/Media/lang/en.json'
import EnNotification from '../../modules/Notification/lang/en.json'
import EnAuth from '../../modules/Auth/lang/en.json'
import EnMain from './lang/en.json'
import EnStorage from '../../modules/Storage/lang/en.json'
    

import SqAuth from '../../modules/Auth/lang/sq.json'
import SqNotification from '../../modules/Notification/lang/sq.json'
import SqHrm from '../../modules/Hrm/lang/sq.json'
import SqSettings from '../../modules/Settings/lang/sq.json'
import SqStorage from '../../modules/Storage/lang/sq.json'
import SqMain from './lang/sq.json'
import SqMedia from '../../modules/Media/lang/sq.json'

import ItAuth from '../../modules/Auth/lang/it.json'
import ItNotification from '../../modules/Notification/lang/it.json'
import ItHrm from '../../modules/Hrm/lang/it.json'
import ItSettings from '../../modules/Settings/lang/it.json'
import ItStorage from '../../modules/Storage/lang/it.json'
import ItMain from './lang/it.json'
import ItMedia from '../../modules/Media/lang/it.json'

i18n
    .use(initReactI18next)
    .init({
        resources: {
            en: {
                Settings: EnSettings,
                Hrm: EnHrm,
                Media: EnMedia,
                Notification: EnNotification,
                Auth: EnAuth,
                Main: EnMain,
                Storage: EnStorage
            },
            sq: {
                Settings: SqSettings,
                Hrm: SqHrm,
                Media: SqMedia,
                Notification: SqNotification,
                Auth: SqAuth,
                Main: SqMain,
                Storage: SqStorage
            },
            it: {
                Settings: ItSettings,
                Hrm: ItHrm,
                Media: ItMedia,
                Notification: ItNotification,
                Auth: ItAuth,
                Main: ItMain,
                Storage: ItStorage
            }
        },
        lng: 'en',
        fallbackLng: 'en',
        interpolation: {
            escapeValue: false,
        },
    });

export default i18n;
