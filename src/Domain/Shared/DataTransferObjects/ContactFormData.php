<?php

namespace Domain\Shared\DataTransferObjects;

use Domain\Shared\Enums\ContactFormType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;

class ContactFormData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $content,
        public readonly string $phone,
        public readonly string $email,
        #[WithCast(EnumCast::class)]
        public readonly ContactFormType $type,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => 'required|string',
            'content' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'required|string',
            'type' => 'required|string',
        ];
    }

    public static function attributes(): array
    {
        return [
            'name' => 'ФИО',
            'content' => 'содержание',
            'phone' => 'телефон',
            'email' => 'электронная почта',
            'type' => 'тип обращения',
        ];
    }
}
