<?php

namespace Domain\Shared\Models;

/**
 * @property string $for
 * @property string $text
 */
class Content extends BaseModel
{
    protected $fillable = [
        'for',
        'text',
    ];
}
