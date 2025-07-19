<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ambil atau buat role Admin
        $adminRole = Role::firstOrCreate(
            ['name' => 'Admin', 'guard_name' => 'web']
        );

        // 2. Daftar permission yang dimiliki admin
        $adminPermissions = [
            'create_organizations', 'read_organizations', 'update_organizations', 'delete_organizations',
            'create_divisions', 'read_divisions', 'update_divisions', 'delete_divisions',
            'create_schools', 'read_schools', 'update_schools', 'delete_schools',
            'create_batches', 'read_batches', 'update_batches', 'delete_batches',
            'create_members', 'read_members', 'update_members', 'delete_members',
            'create_programs', 'read_programs', 'update_programs', 'delete_programs',
            'create_news', 'read_news', 'update_news', 'delete_news',
        ];

        // 3. Buat semua permission (jika belum ada)
        foreach ($adminPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // 4. Sinkronkan permission ke role Admin (tidak duplikat)
        $adminRole->syncPermissions($adminPermissions);

        // 5. Buat user admin jika belum ada
        $admin = User::firstOrCreate(
            ['email' => 'adminfokade1@gmail.com'],
            [
                'name'     => 'Admin Fokade 1',
                'password' => Hash::make('4dm1nf0k4d3'),
            ]
        );

        // 6. Cek dulu sebelum assign role Admin
        if (! $admin->hasRole('Admin')) {
            $admin->assignRole('Admin');
        }
    }
}
