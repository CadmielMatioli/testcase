<?php

namespace App\Repositories;

use App\Models\ClassRoom;
use App\Repositories\Contracts\ClassRoomContract;
use App\Repositories\Contracts\UserContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClassRoomRepository implements ClassRoomContract
{

    public function index() {
        return ClassRoom::get();
    }
    public function create($request): void {}

    public function update($request, $classRoom): void {}

    public function delete($classRoom): void {}

    public function getByName($name) {
        return ClassRoom::where('name', $name)->first();
    }

}
