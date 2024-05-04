<?php

namespace App\Services;

use App\Imports\UsersImport;
use App\Jobs\ImportUsersExcel;
use App\Jobs\SendEmailJob;
use App\Mail\FinalRegisterUsersEmail;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserService {
    private UserRepository $userRepository;
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index(): LengthAwarePaginator
    {
        return $this->userRepository->index();
    }

    public function create($request): void
    {

        if($this->userRepository->restoreUser($request->email)){
            $this->userRepository->update($request->all(), $this->userRepository->getByEmail($request['email']));
        }else{
            if($request->hasFile('img')){
                $request = $this->imageStore($request);
            }
            $this->userRepository->create($request->all());
        }

    }

    /**
     * @throws \Exception
     */
    public function update($request, $user): bool
    {

        if(array_key_exists('img', $request)){
            $this->imageRemoveOld($user);
            $request = $this->imageStore($request);
        }
        return $this->userRepository->update($request, $user);
    }

    public function delete($user): JsonResponse
    {
        $this->imageRemoveOld($user);
        return $this->userRepository->delete($user);
    }

    public function imageStore($request)
    {
        $fileNamePath = 'users/' . Carbon::now()->format('Y_m_d_H_i_s_') . strtolower(str_replace(' ', '_',  request()->file('img')->getClientOriginalName()));
        $filePath = Storage::disk('public')->put('users', request()->file('img'));
        Storage::move($filePath, $fileNamePath);
        $request['image'] = $fileNamePath;
        return $request;
    }

    public function imageRemoveOld($user): void
    {
        if($user->img){
            Storage::delete($user->img);
        }
    }

    public function importCsv($request)
    {
        if(array_key_exists('file', $request->all())){
            $file = $request->file('file');
            $upload = Storage::disk('local')->put("files", $file);
            dispatch(new ImportUsersExcel($upload, auth()->user()));
            return true;
        }
        return false;
    }
}
