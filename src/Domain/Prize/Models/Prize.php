<?php

namespace Domain\Prize\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $place
 * @property string $description
 * @property string $photo
 */
class Prize extends BaseModel
{
    protected $fillable = [
        'place',
        'description',
        'photo',
    ];

    public function getPrizePhotoUrl(): ?string
    {
        return $this->photo ? Storage::disk('prizes_photo')->url($this->photo) : null;
    }
}
