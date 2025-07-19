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
        // 1. Buat atau ambil role Admin
        $adminRole = Role::firstOrCreate(
            ['name' => 'Admin', 'guard_name' => 'web']
        );

        // 2. Definisikan daftar permission
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

        // 3. Buat permission satu per satu (atau gunakan insert dengan upsert di DB yang mendukung)
        foreach ($adminPermissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm, 'guard_name' => 'web']
            );
        }

        // 4. Sinkronkan permissions ke role Admin
        $adminRole->syncPermissions($adminPermissions);

        // 5. Buat atau ambil user admin
        $admin = User::firstOrCreate(
            ['email' => 'adminfokade1@gmail.com'],
            [
                'name'     => 'Admin Fokade 1',
                'password' => Hash::make('4dm1nf0k4d3'),
            ]
        );

        // 6. Pastikan user memiliki role Admin
        $admin->assignRole('Admin');
    }
}
