<?php

namespace Domain\Shared\Models;

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
