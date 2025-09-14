<?php

declare(strict_types=1);

namespace Modules\Property\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

final class PermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Permission::create(['name' => 'property.create']);
        Permission::create(['name' => 'property.read']);
        Permission::create(['name' => 'property.update']);
        Permission::create(['name' => 'property.delete']);

        Permission::create(['name' => 'property_type.create']);
        Permission::create(['name' => 'property_type.read']);
        Permission::create(['name' => 'property_type.update']);
        Permission::create(['name' => 'property_type.delete']);

        Permission::create(['name' => 'property_status.create']);
        Permission::create(['name' => 'property_status.read']);
        Permission::create(['name' => 'property_status.update']);
        Permission::create(['name' => 'property_status.delete']);
    }
}
