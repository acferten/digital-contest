<?php

namespace Domain\Products\Enums;

enum OrderStatus: string
{
    case Paid = 'Оплачен';
    case Pending = 'Ожидает оплаты';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
