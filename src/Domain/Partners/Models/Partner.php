<?php

namespace Domain\Partners\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $name
 * @property string $logo
 */
class Partner extends BaseModel
{
    protected $fillable = [
        'name',
        'logo',
    ];

    public function getLogoUrl(): ?string
    {
        return $this->logo ? Storage::disk('logos')->url($this->logo) : null;
    }
}
