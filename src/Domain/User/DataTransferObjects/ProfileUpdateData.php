<?php

namespace Domain\User\DataTransferObjects;

use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class ProfileUpdateData extends Data
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $username,
        public readonly ?string $about,
    ) {
    }

    public static function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user())],
            'about' => ['nullable', 'string'],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            'first_name' => 'имя',
            'last_name' => 'фамилия компании',
            'username' => 'псевдоним',
            'about' => 'краткая информация о себе',
        ];
    }
}
