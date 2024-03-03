<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'username' => 'admin',
                'password' => 'admin123',
                'email' => 'admin@gmail.com',
                'full_name' => 'Admin',
                'role' => 'admin',
            ],
            [
                'username' => 'officer',
                'password' => 'officer123',
                'email' => 'officer@gmail.com',
                'full_name' => 'Officer',
                'role' => 'officer',
            ]
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
