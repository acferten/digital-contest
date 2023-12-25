<?php

namespace Domain\News\Models;

use Domain\Shared\Models\BaseModel;

class News extends BaseModel
{
    protected $fillable = [
        'id',
        'title',
        'content'
    ];
}
