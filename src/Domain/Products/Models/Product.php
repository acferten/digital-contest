<?php

namespace Domain\Products\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $price
 */
class Product extends BaseModel
{
    protected $fillable = [
        'name',
        'price',
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'orders')
            ->withPivot('work_id')->withTimestamps();
    }
}
