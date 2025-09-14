<?php

declare(strict_types=1);

namespace Modules\Property\database\seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

final class AdminPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::findByName(RolesEnum::ADMIN->value);

        $role->givePermissionTo("property.create");
        $role->givePermissionTo("property.read");
        $role->givePermissionTo("property.update");
        $role->givePermissionTo("property.delete");

        $role->givePermissionTo("property_type.create");
        $role->givePermissionTo("property_type.read");
        $role->givePermissionTo("property_type.update");
        $role->givePermissionTo("property_type.delete");

        $role->givePermissionTo("property_status.create");
        $role->givePermissionTo("property_status.read");
        $role->givePermissionTo("property_status.update");
        $role->givePermissionTo("property_status.delete");
    }
}
