<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    const PASSWORD = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password

    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@email.com'
            ],
            [
                'name' => 'Usuário admin',
                'is_admin' => true,
                'email' => 'admin@email.com',
                'email_verified_at' => now(),
                'password' => UserSeeder::PASSWORD,
                'remember_token' => Str::random(10)
            ]);

        User::updateOrCreate(
            [
                'email' => 'aluno@email.com'
            ],
            [
                'name' => 'Usuário aluno',
                'is_admin' => false,
                'email' => 'aluno@email.com',
                'email_verified_at' => now(),
                'password' => UserSeeder::PASSWORD,
                'remember_token' => Str::random(10),
                'class_room_id' => 1
            ]);
    }
}
