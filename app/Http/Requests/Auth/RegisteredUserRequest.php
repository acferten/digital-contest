<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisteredUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $maxSize = 2048; //kb
        $allowedTypes = 'jpeg,jpg,png,gif';

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'confirmed', Password::defaults()],
            'profile_picture' => ['nullable', 'mimes:'.$allowedTypes, 'max:'.$maxSize],
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
            'profile_picture' => 'фото/аватар',
            'password' => 'пароль',
            'email' => 'электронная почта',
        ];
    }
}
