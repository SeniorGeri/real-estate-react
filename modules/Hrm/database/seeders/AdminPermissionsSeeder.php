<?php

namespace Modules\Hrm\database\seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::findByName(RolesEnum::ADMIN->value);

        $role->givePermissionTo("agent.create");
        $role->givePermissionTo("agent.read");
        $role->givePermissionTo("agent.profile");
        $role->givePermissionTo("agent.update");
        $role->givePermissionTo("agent.delete");

        $role->givePermissionTo("student.create");
        $role->givePermissionTo("student.read");
        $role->givePermissionTo("student.profile");
        $role->givePermissionTo("student.update");
        $role->givePermissionTo("student.delete");

    }
}
