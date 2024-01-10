<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Ian Okonu',
            'email' => 'okonu@zufu.co.ke',
            'password' => Hash::make('12345678'),
        ]);

        $superAdmin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'Jacob Moracha',
            'email' => 'moracha@zufu.co.ke',
            'password' => Hash::make('12345678'),
        ]);

        $admin->assignRole('Admin');

        $productManager = User::create([
            'name' => 'Shamayeel Karani',
            'email' => 'shamayeel@zufu.co.ke',
            'password' => Hash::make('12345678'),
        ]);

        $productManager->assignRole('Product Manager');
    }
}
