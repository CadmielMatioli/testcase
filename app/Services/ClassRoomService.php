<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\ClassRoomRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class ClassRoomService {
    private ClassRoomRepository $classRoomRepository;
    public function __construct()
    {
        $this->classRoomRepository = new ClassRoomRepository();
    }

    public function index()
    {
        return $this->classRoomRepository->index();
    }

    public function create($request): void
    {
    }

    public function update($request, $classRoom): void
    {
        $this->classRoomRepository->update($request, $classRoom);
    }

    public function delete($classRoom): void
    {
        $this->classRoomRepository->delete($classRoom);
    }

    public function getByName($name)
    {
        return $this->classRoomRepository->getByName($name);
    }
}
