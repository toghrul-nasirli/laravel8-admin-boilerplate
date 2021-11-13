<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'is_admin' => true,
            'username' => 'SUPER_ADMIN',
            'email' => 'super@admin.com',
            'password' => Hash::make('super_admin'),
        ]);
    }
}
