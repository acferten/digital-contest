<?php

namespace Domain\News\Models;

use Domain\Shared\Models\BaseModel;

class News extends BaseModel
{
    protected $fillable = [
        'title',
        'content',
        'publication_date'
    ];
}
