<?php

namespace Domain\News\Models;

use DateTime;
use Domain\Shared\Models\BaseModel;

/**
 * @property string $title
 * @property string $content
 * @property DateTime $publication_date
 */
class News extends BaseModel
{
    protected $fillable = [
        'title',
        'content',
        'publication_date'
    ];
}
