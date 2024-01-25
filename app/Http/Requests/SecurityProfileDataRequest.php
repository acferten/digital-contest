<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SecurityProfileDataRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user())],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }
}
