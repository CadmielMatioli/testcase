<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RequestStore extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img' => 'required',
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users'
        ];
    }
}
