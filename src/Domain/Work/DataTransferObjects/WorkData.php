<?php

namespace Domain\Work\DataTransferObjects;

use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class WorkData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $title,
        public readonly UploadedFile|string $file,
        public readonly ?Genre $genre,
        public readonly int $year,
    ) {
    }

    public static function fromModel(Work $work): self
    {
        return self::from([
            ...$work->toArray(),
            'file' => $work->getWorkFileUrl(),
            'genre' => $work->genre,
        ]);
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
            'id' => $request->route('work')?->id,
            'file' => $request->file('file'),
            'genre' => Genre::find($request->input('genre_id')),
        ]);
    }

    public static function rules(): array
    {
        return [
            'file' => 'image|max:4192',
            'title' => 'required|string',
            'year' => 'required|int|max:2023|min:2000',
            'genre_id' => 'required|exists:genres,id',
        ];
    }

    public static function attributes(): array
    {
        return [
            'title' => 'название',
            'file' => 'файл',
        ];
    }
}
