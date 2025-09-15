<?php

declare(strict_types=1);

namespace Modules\Property\database\seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

final class AgentPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::findByName(RolesEnum::AGENT->value);

        $role->givePermissionTo("property.create");
        $role->givePermissionTo("property.read");
        $role->givePermissionTo("property.update");

    }
}
