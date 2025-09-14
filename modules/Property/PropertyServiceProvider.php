<?php

declare(strict_types=1);

namespace Modules\Property;

use Illuminate\Support\ServiceProvider;

final class PropertyServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__.'/routes/property.php');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

    }
}