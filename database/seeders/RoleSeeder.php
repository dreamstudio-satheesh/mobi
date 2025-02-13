<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define modules with actions and role-specific permissions for the mobile shop MVP
        $modules = [
            'dashboard' => [
                'actions' => [
                    'view' => 'dashboard.view'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['view'],
                    RoleEnum::REPAIR_TECHNICIAN => ['view'],
                    RoleEnum::SALES_CSR => ['view'],
                ]
            ],
            'inventory' => [
                'actions' => [
                    'index'  => 'inventory.index',
                    'create' => 'inventory.create',
                    'edit'   => 'inventory.edit',
                    'delete' => 'inventory.delete'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['index', 'create', 'edit', 'delete'],
                    RoleEnum::SALES_CSR => ['index'],
                ]
            ],
            'repair' => [
                'actions' => [
                    'index'    => 'repair.index',
                    'create'   => 'repair.create',
                    'update'   => 'repair.update',
                    'complete' => 'repair.complete'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['index', 'create', 'update', 'complete'],
                    RoleEnum::REPAIR_TECHNICIAN => ['index', 'create', 'update', 'complete'],
                    RoleEnum::SALES_CSR => ['index'],
                ]
            ],
            'sales' => [
                'actions' => [
                    'index'  => 'sales.index',
                    'create' => 'sales.create',
                    'edit'   => 'sales.edit',
                    'delete' => 'sales.delete'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['index', 'create', 'edit', 'delete'],
                    RoleEnum::SALES_CSR => ['index', 'create', 'edit'],
                ]
            ],
            'crm' => [
                'actions' => [
                    'index'  => 'crm.index',
                    'update' => 'crm.update'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['index', 'update'],
                    RoleEnum::SALES_CSR => ['index', 'update'],
                ]
            ],
            'reports' => [
                'actions' => [
                    'view' => 'reports.view'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['view'],
                    RoleEnum::SALES_CSR => ['view'],
                ]
            ],
            'settings' => [
                'actions' => [
                    'index'  => 'settings.index',
                    'update' => 'settings.update'
                ],
                'roles' => [
                    RoleEnum::ADMIN => ['index', 'update']
                ]
            ]
        ];

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Initialize permission arrays for our three roles
        $adminPermissions = [];
        $repairTechnicianPermissions = [];
        $salesCSRPermissions = [];

        // Loop through each module and create/update permissions
        foreach ($modules as $moduleName => $moduleData) {
            Module::updateOrCreate(
                ['name' => $moduleName],
                ['name' => $moduleName, 'actions' => $moduleData['actions']]
            );

            foreach ($moduleData['actions'] as $actionKey => $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                if (isset($moduleData['roles'])) {
                    foreach ($moduleData['roles'] as $roleName => $allowedActions) {
                        if (in_array($actionKey, $allowedActions)) {
                            if ($roleName === RoleEnum::ADMIN) {
                                $adminPermissions[] = $permission;
                            }
                            if ($roleName === RoleEnum::REPAIR_TECHNICIAN) {
                                $repairTechnicianPermissions[] = $permission;
                            }
                            if ($roleName === RoleEnum::SALES_CSR) {
                                $salesCSRPermissions[] = $permission;
                            }
                        }
                    }
                }
            }
        }

        // Create roles and assign permissions

        // Admin role (acts as the store manager)
        $admin = Role::create([
            'name' => RoleEnum::ADMIN,
            'system_reserve' => true
        ]);
        // Grant Admin full access (or you could alternatively assign $adminPermissions)
        $admin->givePermissionTo(Permission::all());

        // Repair Technician role
        $repairTechnician = Role::create([
            'name' => RoleEnum::REPAIR_TECHNICIAN,
            'system_reserve' => false
        ]);
        $repairTechnician->givePermissionTo($repairTechnicianPermissions);

        // Sales & Customer Service Representative role
        $salesCSR = Role::create([
            'name' => RoleEnum::SALES_CSR,
            'system_reserve' => false
        ]);
        $salesCSR->givePermissionTo($salesCSRPermissions);

        // Create demo users for each role

        // Admin user
        $adminUser = User::factory()->create([
            'first_name'   => 'Admin',
            'last_name'    => 'User',
            'email'        => 'admin@example.com',
            'password'     => Hash::make('123456789'),
        ]);
        $adminUser->assignRole($admin);

        // Repair Technician user
        $techUser = User::factory()->create([
            'first_name'   => 'Tech',
            'last_name'    => 'User',
            'email'        => 'tech@example.com',
            'password'     => Hash::make('123456789'),
        ]);
        $techUser->assignRole($repairTechnician);

        // Sales & Customer Service Representative user
        $salesUser = User::factory()->create([
            'first_name'   => 'Sales',
            'last_name'    => 'User',
            'email'        => 'sales@example.com',
            'password'     => Hash::make('123456789'),
        ]);
        $salesUser->assignRole($salesCSR);
    }
}
