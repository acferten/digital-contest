<?php

namespace Domain\Work\Enums;

enum WorkStatus: string
{
    case Published = 'Опубликован';
    case Pending = 'Ожидает оплаты';
    case Archived = 'В архиве';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
