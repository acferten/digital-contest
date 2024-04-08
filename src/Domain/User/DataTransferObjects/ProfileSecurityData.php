<?php

namespace Domain\User\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\LaravelData\Data;

class ProfileSecurityData extends Data
{
    public function __construct(
        public readonly ?string $email,
        public readonly ?string $password,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'email' => $request->validated('email') ?
                $request->validated('email') : $request->user()->email,
            'password' => $request->validated('password') ?
                Hash::make($request->validated('password')) : $request->user()->password,
        ]);
    }

    public static function rules(): array
    {
        return [
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user())],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }
}
