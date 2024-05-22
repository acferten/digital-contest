<?php

namespace Domain\Work\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\Models\User;
use Domain\Work\DataTransferObjects\WorkData;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\WithData;

/**
 * @property int $id
 * @property string $title
 * @property string $file
 * @property int $year
 * @property string $status
 * @property Genre $genre
 * @property User $user
 * @property Collection<Work> $votes
 */
class Work extends BaseModel
{
    use WithData;

    protected string $dataClass = WorkData::class;

    protected $fillable = [
        'title',
        'file',
        'year',
        'genre_id',
        'user_id',
        'status',
    ];

    public function getWorkFileUrl(): ?string
    {
        return Storage::disk('artworks')->url($this->file);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function votes(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'votes')
            ->withPivot('is_free')
            ->withTimestamps();
    }
}
