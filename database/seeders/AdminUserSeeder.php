<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'ikram',
            'last_name' => 'User',
            'email' => 'ikramben@gmail.com',
            'password' => bcrypt('ikram2005'), // Change this password
            'role' => 'ADMIN',
            'email_verified_at' => now(),
        ]);
    }
}
