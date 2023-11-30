<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $roles = [
            'admin',
            'client',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Definir permisos comunes
        $commonPermissions = [
            'home',
        ];

        // Asignar permisos a roles
        $rolePermissions = [
            'admin' => [
                'plan.create',
                'plan.store',
                'plan.edit',
                'plan.update',
                'plan.destroy',
                'quotation.create',
                'quotation.edit',
                'quotation.update',
                'quotation.destroy',
                'admin.users.index',
                'admin.users.create',
                'admin.users.store',
                'admin.users.show',
                'admin.users.edit',
                'admin.users.update',
                'admin.users.destroy',
                'admin.plans.index',
                'admin.plans.edit',
                'admin.plans.update',
                'admin.plans.destroy',
                'admin.quotations.index',
                'quotation.create',
                'quotation.store',
                'admin.quotations.edit',
                'admin.quotations.update',
                'admin.quotations.destroy',
            ],

            'client' => array_merge($commonPermissions, [
                'insurance_request.create',
                'insurance_request.store',
                'insurance_request.edit',
                'insurance_request.update',
                'insurance_request.destroy',
                'quotation.show',
            ]),
        ];

        foreach ($rolePermissions as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            foreach ($permissions as $permissionName) {
                Permission::firstOrCreate(['name' => $permissionName]);
                $role->givePermissionTo($permissionName);
            }
        }
    }
}
