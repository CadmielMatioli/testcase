<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdate extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = $this->route('user');
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'. $user->id
        ];
    }
}
