<?php

declare(strict_types=1);

namespace Modules\Property\database\seeders;

use Illuminate\Database\Seeder;

final class PropertySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(AdminPermissionsSeeder::class);
        $this->call(AgentPermissionsSeeder::class);
        $this->call(StaticDataSeeder::class);
    }
}
