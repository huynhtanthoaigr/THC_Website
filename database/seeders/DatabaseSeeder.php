<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo quyền
        $permissions = ['manage users', 'manage posts']; // Tạo thêm quyền nếu cần
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Tạo vai trò
        $roles = ['admin', 'user'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        // Tạo tài khoản Admin
        $admin = User::updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin User',
            'phone' => '0123456789',
            'password' => bcrypt('12345678'),
            'address' => '123 Main Street'
        ]);

        $admin->assignRole('admin'); // Gán quyền Admin
    }
}
