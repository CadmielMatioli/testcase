<?php

namespace App\Imports;

use App\Models\User;
use App\Repositories\ClassRoomRepository;
use Database\Seeders\UserSeeder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{

    public $user;
    public int $totalRows = 0;
    private ClassRoomRepository $classRoomRepository;
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->classRoomRepository = new ClassRoomRepository();
    }
    public function model(array $row): User
    {
        ++$this->totalRows;
        return User::updateOrCreate(
            [
                'email' => $row['email'],
            ],
            [
            'name' => $row['nome_do_aluno'],
            'class_room_id' =>  $this->classRoomRepository->getByName($row['nome_da_sala_de_aula'])->id,
            'password' => UserSeeder::PASSWORD
        ]);
    }

    public function getTotalRows()
    {
        return $this->totalRows;
    }
    public function headingRow(): int
    {
        return 1;
    }

}
