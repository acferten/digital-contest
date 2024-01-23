<?php

namespace Domain\Work\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $name
 */
class Genre extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    public function works(): hasMany
    {
        return $this->hasMany(Work::class, 'genre_id');
    }
}
