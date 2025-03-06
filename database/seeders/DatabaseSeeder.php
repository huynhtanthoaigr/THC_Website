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
            'password' => Hash::make('12345678'),
            'date_of_birth' => '1990-01-01',
            'gender' => 'male',
            'address' => '123 Đường ABC, Quận 1, TP. HCM',
        ]);

        $admin->assignRole('admin'); // Gán quyền Admin

        // Tạo tài khoản User
        $users = [
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'user1@gmail.com',
                'phone' => '0987654321',
                'password' => Hash::make('12345678'),
                'date_of_birth' => '1995-06-15',
                'gender' => 'male',
                'address' => '456 Đường XYZ, Quận 2, TP. HCM',
            ],
            [
                'name' => 'Trần Thị B',
                'email' => 'user2@example.com',
                'phone' => '0971122334',
                'password' => Hash::make('password'),
                'date_of_birth' => '1998-09-20',
                'gender' => 'female',
                'address' => '789 Đường DEF, Quận 3, TP. HCM',
            ],
            [
                'name' => 'Lê Văn C',
                'email' => 'user3@example.com',
                'phone' => '0964455667',
                'password' => Hash::make('password'),
                'date_of_birth' => '2000-12-10',
                'gender' => 'other',
                'address' => '321 Đường GHI, Quận 4, TP. HCM',
            ]
        ];

        foreach ($users as $userData) {
            $user = User::updateOrCreate(['email' => $userData['email']], $userData);
            $user->assignRole('user'); // Gán quyền User
        }
    }
}
