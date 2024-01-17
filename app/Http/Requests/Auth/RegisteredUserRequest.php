<?php

namespace App\Http\Requests\Auth;

use Domain\Shared\Models\User;
use Illuminate\Foundation\Http\FormRequest;
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
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
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
