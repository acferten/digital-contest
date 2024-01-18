<?php

namespace Domain\Prize\DataTransferObjects;

use Domain\Prize\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class PrizeData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $place,
        public readonly string $description,
        public readonly UploadedFile|string $photo,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
            'id' => $request->route('prize')?->id,
            'photo' => $request->file('photo'),
        ]);
    }

    public static function rules(): array
    {
        return [
            'photo' => 'required|image|max:4192',
            'description' => 'required|string',
            'place' => 'required|integer',
        ];
    }

    public static function attributes(): array
    {
        return [
            'place' => 'место',
            'description' => 'описание',
            'photo' => 'фото приза',
        ];
    }
}
