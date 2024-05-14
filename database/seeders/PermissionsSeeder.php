<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $permissions = ['user_management', 'ticket_management'];
        // foreach ($permissions as $permission) {
        //     if (!Permission::where('name', $permission)->exists()) {
        //         Permission::create(['name' => $permission]);
        //         $this->command->info("Permission '{$permission}' created successfully.");
        //     } else {
        //         $this->command->info("Permission '{$permission}' already exists.");
        //     }
        // }
        
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
         Permission::create(['name' => 'user_management']);
         Permission::create(['name' => 'create_user']);
         Permission::create(['name' => 'ticket_management']);
         Permission::create(['name' => 'create_ticket']);
         Permission::create(['name' => 'assign_ticket']);
         Permission::create(['name' => 'reassign_ticket']);
         Permission::create(['name' => 'report_card']);
         Permission::create(['name' => 'operator_management']);
         Permission::create(['name' => 'dcrim_management']);
         Permission::create(['name' => 'zcrim_management']);
         Permission::create(['name' => 'agent_management']);
         Permission::create(['name' => 'process_management']);
         Permission::create(['name' => 'technical_management']);
         Permission::create(['name' => 'close_ticket']);
         Permission::create(['name' => 'edit_ticket']);
 

    }
}
