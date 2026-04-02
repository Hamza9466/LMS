<?php

namespace Database\Seeders;

use App\Models\AdminDetail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed a default admin user.
     */
    public function run(): void
    {
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ]
        );

        AdminDetail::updateOrCreate(
            ['user_id' => $adminUser->id],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
            ]
        );
    }
}
