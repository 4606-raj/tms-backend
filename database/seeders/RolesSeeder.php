<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Prevent triggering model events for performance
        // Role::withoutEvents(function () {
        //     // Create admin role
        //     $adminRole = Role::firstOrCreate(['name' => 'admin']);
        //     $this->command->info("Role 'admin' created successfully.");

        //     // Create user role
        //     $userRole = Role::firstOrCreate(['name' => 'user']);
        //     $this->command->info("Role 'user' created successfully.");

        //     // Assign permissions to admin role
        //     $adminPermissions = Permission::pluck('id');
        //     $adminRole->syncPermissions($adminPermissions);
        //     $this->command->info("Permissions assigned to 'admin' role successfully.");

        //     // Assign only 'ticket_management' permission to user role
        //     $userPermission = Permission::where('name', 'ticket_management')->first();
        //     if ($userPermission) {
        //         $userRole->givePermissionTo($userPermission);
        //         $this->command->info("Permission 'ticket_management' assigned to 'user' role successfully.");
        //     } else {
        //         $this->command->error("Permission 'ticket_management' not found.");
        //     }
        // });

         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Role::create(['name' => 'admin'])
             ->givePermissionTo(['user_management','create_user','ticket_management','report_card']);
 
        Role::create(['name' => 'operator'])
             ->givePermissionTo(['ticket_management','create_ticket','close_ticket','reassign_ticket']);
        
        Role::create(['name' => 'process'])
             ->givePermissionTo(['process_management','ticket_management']);
        Role::create(['name' => 'technical'])
             ->givePermissionTo(['technical_management','ticket_management']);
        Role::create(['name' => 'dcrim'])
             ->givePermissionTo(['dcrim_management','ticket_management']);
        Role::create(['name' => 'zcrim'])
             ->givePermissionTo(['zcrim_management','ticket_management']);
        Role::create(['name' => 'agent'])
             ->givePermissionTo(['agent_management','ticket_management']);
         
    }
}
