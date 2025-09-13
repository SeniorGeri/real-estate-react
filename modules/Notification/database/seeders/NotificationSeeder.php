<?php

namespace Modules\Notification\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Notification\Models\NotificationType;

class NotificationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(AdminPermissionsSeeder::class);
        $this->call(AgentPermissionsSeeder::class);

        NotificationType::create([
            'type' => 'contact',
        ]);
        NotificationType::create([
            'type' => 'payment',
        ]);
        NotificationType::create([
            'type' => 'liquidation',
        ]);
        NotificationType::create([
            'type' => 'agent',
        ]);
        NotificationType::create([
            'type' => 'order',
        ]);
    }
}
