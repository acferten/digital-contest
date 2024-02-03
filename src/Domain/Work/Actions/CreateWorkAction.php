<?php

namespace Domain\Work\Actions;

use Domain\Work\DataTransferObjects\WorkData;
use Domain\Work\Models\Work;

class CreateWorkAction
{
    public static function execute(WorkData $data): Work
    {
        return Work::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                ...$data->all(),
                'file' => $data->file->storePublicly('', ['disk' => 'artworks']),
                'genre_id' => $data->genre->id,
                'user_id' => auth()->user()->id,
            ]
        );
    }
}
