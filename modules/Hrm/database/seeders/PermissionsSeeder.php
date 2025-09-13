<?php

namespace Modules\Hrm\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::create(["name" => "agent.create"]);
        Permission::create(["name" => "agent.read"]);
        Permission::create(["name" => "agent.profile"]);
        Permission::create(["name" => "agent.update"]);
        Permission::create(["name" => "agent.delete"]);

        Permission::create(["name" => "student.create"]);
        Permission::create(["name" => "student.read"]);
        Permission::create(["name" => "student.profile"]);
        Permission::create(["name" => "student.update"]);
        Permission::create(["name" => "student.delete"]);
    }
}
