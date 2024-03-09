<?php

namespace Domain\Shared\Enums;

enum ContactFormType: string
{
    case tech = 'Техническая поддержка';
    case question = 'Вопрос';
    case report = 'Жалоба';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
