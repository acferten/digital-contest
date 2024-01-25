<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user())],
            'about' => ['nullable', 'string'],
        ];
    }

    public function attributes(...$args): array
    {
        return [
            'first_name' => 'имя',
            'last_name' => 'фамилия компании',
            'username' => 'псевдоним',
            'about' => 'краткая информация о себе',
        ];
    }
}
