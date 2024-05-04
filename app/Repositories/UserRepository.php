<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserContract;
use Database\Seeders\UserSeeder;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserContract
{

    public function index(): LengthAwarePaginator {
        return User::where('id', '!=', auth()->user()->id)
            ->when(request()->name, function ($query) {
                $query->where('name', 'LIKE', "%".request()->name."%");
            })
            ->orderBy('name')
            ->paginate(10);
    }

    public function create($request): void {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'img' => $request['image'],
            'password' => UserSeeder::PASSWORD,
            'class_room_id' => $request['class_room'],
            'is_admin' => array_key_exists('is_admin', $request)
        ]);
    }

    public function update($request, $user): bool
    {
        $arrayToUpdate = [
            'name' => $request['name'],
            'email' => $request['email'],
            'is_admin' => array_key_exists('is_admin', $request),
            'class_room_id' =>  $request['class_room'],
            'status' => array_key_exists('status', $request)
        ];
        if(array_key_exists('image', $request)){
            $arrayToUpdate['img'] = $request['image'];
        }
        return $user->update($arrayToUpdate);
    }

    public function delete($user): JsonResponse {
        try {

            if (!$user) {
                return response()->json([
                    'message' => __('messages.user.error.not-user')
                ], 400);
            }

            if ($this->checkUserIsAdmin($user)) {
                return response()->json([
                    'message' => __('messages.user.error.admin.destroy')
                ], 400);
            }

            $user->delete();
            $user->units()->detach();

            return response()->json(['message' => __('messages.user.success.destroy'), 200]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => __('messages.user.error.destroy')
            ], 500);
        }
    }

    public function checkUserIsAdmin($user): bool
    {
        return $user->role == User::isAdmin;
    }

    public function restoreUser($email)
    {

        $user = User::onlyTrashed()->where('email', $email)->first();
        if($user){
            return $user->restore();
        }
        return false;
    }

    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
