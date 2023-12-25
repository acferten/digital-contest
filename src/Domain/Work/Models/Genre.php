<?php

namespace Domain\Work\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends BaseModel
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function works(): hasMany
    {
        return $this->hasMany(Work::class, 'genre_id');
    }
}
