<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassRoom::updateOrCreate(['name' => 'Turma 1', 'created_at' => now()]);
        ClassRoom::updateOrCreate(['name' => 'Turma 2', 'created_at' => now()]);
        ClassRoom::updateOrCreate(['name' => 'Turma 3', 'created_at' => now()]);
        ClassRoom::updateOrCreate(['name' => 'Turma 4', 'created_at' => now()]);
        ClassRoom::updateOrCreate(['name' => 'Turma 5', 'created_at' => now()]);
    }
}
