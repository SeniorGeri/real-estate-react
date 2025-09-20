<?php

declare(strict_types=1);

namespace Modules\Frontend;

use Modules\Frontend\Components\LanguageSwitcher;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

final class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/frontend.php');

        $this->loadViewsFrom(__DIR__.'/resources', 'frontend');

        Blade::component('language-switcher', LanguageSwitcher::class);

        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');


    }
}