<?php

return [
    App\Providers\AppServiceProvider::class,
    Modules\Settings\SettingsServiceProvider::class,
    Modules\Media\MediaServiceProvider::class,
    Modules\Hrm\HrmServiceProvider::class,
    Modules\Operational\OperationalServiceProvider::class,
    Modules\Finance\FinanceServiceProvider::class,
    Modules\Frontend\FrontendServiceProvider::class,
    Modules\Notification\NotificationServiceProvider::class,
    Modules\Auth\AuthServiceProvider::class,
    Modules\Storage\StorageServiceProvider::class,
];
