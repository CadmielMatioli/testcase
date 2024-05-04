<?php

namespace App\Jobs;

use App\Imports\UsersImport;
use App\Mail\FinalRegisterUsersEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportUsersExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $fileName;
    private $authUser;
    public function __construct($fileName, $authUser)
    {
        $this->fileName = $fileName;
        $this->authUser = $authUser;
    }

    public function handle(): void
    {
            $usersImport = new UsersImport($this->authUser);
            Excel::import($usersImport, Storage::disk('local')->path($this->fileName));
            Mail::to($this->authUser->email)->send(new FinalRegisterUsersEmail($this->authUser, $usersImport->getTotalRows()));
    }
}
