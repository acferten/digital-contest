<?php

namespace Domain\Shared\Models;

/**
 * @property string $name
 * @property string $content
 * @property string $email
 * @property string $type
 * @property int $phone
 */
class ContactForm extends BaseModel
{
    protected $fillable = [
        'name',
        'content',
        'phone',
        'email',
        'type',
    ];
}
