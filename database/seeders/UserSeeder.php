<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin']);

        $adminPermissions = [
            'create_organizations',
            'read_organizations',
            'update_organizations',
            'delete_organizations',
            'create_divisions',
            'read_divisions',
            'update_divisions',
            'delete_divisions',
            'create_schools',
            'read_schools',
            'update_schools',
            'delete_schools',
            'create_batches',
            'read_batches',
            'update_batches',
            'delete_batches',
            'create_members',
            'read_members',
            'update_members',
            'delete_members',
            'create_programs',
            'read_programs',
            'update_programs',
            'delete_programs',
            'create_news',
            'read_news',
            'update_news',
            'delete_news',
        ];
        Permission::insert(array_map(fn($name) => ['name' => $name, 'guard_name' => 'web'], $adminPermissions));

        $adminRole->syncPermissions($adminPermissions);

        User::factory()->create([
            'name' => 'Admin Fokade 1',
            'email' => 'adminfokade1@gmail.com',
            'password' => Hash::make("4dm1nf0k4d3"),
        ]);
        User::firstWhere('email', 'adminfokade1@gmail.com')->assignRole('Admin');
    }
}
