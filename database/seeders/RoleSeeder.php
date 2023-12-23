<?php

namespace Database\Seeders;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developer = Role::create(['name' => 'developer']);
        $admin = Role::create(['name' => 'admin']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $user = Role::create(['name' => 'user']);


        Permission::create(['name' => 'home.home'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'home.about'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'home.blog'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'home.contact'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'home.services'])->syncRoles([$developer, $admin, $supervisor, $user]);

        Permission::create(['name' => 'users.users'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'users.create'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'users.show'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'companies.insurance-companies'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'companies.insurance-company-create'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'companies.insurance-company-show'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'companies.insurance-company-edit'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'companies.insurance-company-delete'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'policies.insurance-policies'])->syncRoles([$developer, $admin, $supervisor]);
        Permission::create(['name' => 'policies.insurance-policy-create'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'policies.insurance-policy-show'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'policies.insurance-policy-edit'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'policies.insurance-policy-delete'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'plans.insurance-plans'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'plans.insurance-plan-create'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'plans.insurance-plan-show'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'plans.insurance-plan-edit'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'plans.insurance-plan-delete'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'lines.insurance-lines'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'lines.insurance-line-create'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'lines.insurance-line-show'])->syncRoles([$developer, $admin, $supervisor, $user]);
        Permission::create(['name' => 'lines.insurance-line-edit'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'lines.insurance-line-delete'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'holders.policy-holders'])->syncRoles([$developer, $admin, $supervisor]);
        Permission::create(['name' => 'holders.policy-holder-create'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'holders.policy-holder-show'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'holders.policy-holder-edit'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'admin'])->syncRoles([$developer, $admin]);
    }
}
