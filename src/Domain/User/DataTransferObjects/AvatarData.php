<?php

namespace Domain\User\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Mimes;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class AvatarData extends Data
{
    public function __construct(
        #[Required, Image, Max(1024), Mimes(['jpg', 'png'])]
        public readonly UploadedFile $avatar
    )
    {
    }
}
