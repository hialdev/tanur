<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class URPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Buat Role
        $roles = [
            'developer',
            'admin',
            'accounting', // Ditambahkan karena digunakan untuk accounting
            'employee', // Ditambahkan karena digunakan untuk Karyawan
            'stocker', // Ditambahkan karena digunakan untuk Karyawan
        ];

        // 2. Buat Permission
        $permissions = [
            'bismillah',
            'account',
            'sso',
            'accounting',
            'stock', // Ditambahkan karena digunakan untuk Karyawan
        ];

        // Buat Permission jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat Role jika belum ada
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // 3. Assign permission ke role developer
        $role = Role::where('name', 'developer')->first();
        $role->syncPermissions(['stock', 'account', 'sso', 'accounting']);
        $role = Role::where('name', 'admin')->first();
        $role->syncPermissions(['stock', 'account', 'sso']);
        $role = Role::where('name', 'accounting')->first();
        $role->syncPermissions(['stock', 'account', 'accounting']);
        $role = Role::where('name', 'employee')->first();
        $role->syncPermissions(['stock', 'account']);

        // 4. Buat User Developer dan assign role + permission
        $developer = User::firstOrCreate([
            'email' => 'al@hiamalif.com',
        ], [
            'name' => 'AL Developer',
            'password' => bcrypt('password123'),
        ]);

        $developer->assignRole('developer');

        // 5. Buat User Admin
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password123'),
        ]);

        $admin->assignRole('admin');

        // 6. Buat User accounting
        $accountingUsers = [
            [
                'name' => 'Accounting User 1',
                'email' => 'accounting1@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Accounting User 2',
                'email' => 'accounting2@example.com',
                'password' => bcrypt('password123'),
            ],
        ];

        foreach ($accountingUsers as $accountingUser) {
            $user = User::firstOrCreate(
                ['email' => $accountingUser['email']],
                $accountingUser
            );
            $user->assignRole('accounting');
        }  

        $employees = [
            [
                'name' => 'Employee User 1',
                'email' => 'employee1@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Employee User 2',
                'email' => 'employee2@example.com',
                'password' => bcrypt('password123'),
            ],
        ];

        foreach ($employees as $employee) {
            $user = User::firstOrCreate(
                ['email' => $employee['email']],
                $employee
            );
            $user->assignRole('employee');
        }
        
        $this->command->info('Users, roles, and permissions created successfully.');
    }
}
