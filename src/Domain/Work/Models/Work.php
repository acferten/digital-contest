<?php

namespace Domain\Work\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\Models\User;
use Domain\Work\DataTransferObjects\WorkData;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class Work extends BaseModel
{
    use WithData;

    protected string $dataClass = WorkData::class;

    protected $fillable = [
        'id',
        'title',
        'file',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
