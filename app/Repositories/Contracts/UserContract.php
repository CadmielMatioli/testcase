<?php
    namespace App\Repositories\Contracts;

    use App\Models\User;

    interface UserContract
    {
        public function index();
        public function create(array $request);
        public function update(array $request, User $user);
        public function delete(User $user);
    }
