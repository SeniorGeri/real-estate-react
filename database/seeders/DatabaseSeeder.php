<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Settings\database\seeders\SettingsSeeder;
use Modules\Hrm\database\seeders\HrmSeeder;
use Modules\Notification\database\seeders\NotificationSeeder;
use Modules\Storage\database\seeders\StorageSeeder;
use Modules\Property\database\seeders\PropertySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

            $this->call(RolesSeeder::class);
     
            $user = User::create([
                'name' => 'admin',
                'email' => 'admin@real-estate.com',
                'password' => '12345678',
            ]);

            $user->assignRole(RolesEnum::ADMIN->value);

            $this->call(SettingsSeeder::class);
            $this->call(HrmSeeder::class);
            $this->call(NotificationSeeder::class);
            $this->call(StorageSeeder::class);
            $this->call(PropertySeeder::class);

    }
}
