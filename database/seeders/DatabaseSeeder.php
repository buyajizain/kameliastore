<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with 3 defined roles.
     */
    public function run(): void
    {
        // 1. Role Admin (Super Administrator / Owner)
        User::updateOrCreate(
            ['email' => 'admin@kameliastore.com'],
            [
                'name' => 'Admin Kamelia Store',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // 2. Role Staff (Staff Operasional / CS Concierge)
        User::updateOrCreate(
            ['email' => 'staff@kameliastore.com'],
            [
                'name' => 'Staff Concierge',
                'password' => Hash::make('password'),
                'role' => 'staff',
            ]
        );

        // 3. Role Customer (Pelanggan / Member VIP)
        User::updateOrCreate(
            ['email' => 'customer@kameliastore.com'],
            [
                'name' => 'Customer VIP',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ]
        );
    }
}
