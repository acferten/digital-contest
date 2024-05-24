<?php

namespace Domain\Prize\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class PrizeData extends Data
{
    public function __construct(
        public readonly ?int                $id,
        public readonly string              $title,
        public readonly string              $description,
        public readonly int                 $importance,
        public readonly UploadedFile|string $photo,
    )
    {
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
            'title' => 'required|string|max:20',
            'importance' => 'required|integer|unique:prizes,importance',
        ];
    }

    public static function attributes(): array
    {
        return [
            'title' => 'название',
            'description' => 'описание',
            'photo' => 'фото приза',
            'importance' => 'важность',
        ];
    }
}
