<?php

namespace Domain\Products\Enums;

enum ProductEnum: string
{
    case Voting = 'Проголосовать за работу';
    case Publish = 'Опубликовать работу';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
