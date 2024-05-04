<?php
    namespace App\Repositories\Contracts;

    use App\Models\ClassRoom;

    interface ClassRoomContract
    {
        public function index();
        public function create(array $request);
        public function update(array $request, ClassRoom $classRoom);
        public function delete(ClassRoom $classRoom);
    }
