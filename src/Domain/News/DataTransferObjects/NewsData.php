<?php

namespace Domain\News\DataTransferObjects;

use Spatie\LaravelData\Data;

class NewsData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $title,
        public readonly string $content,
    ) {
    }

    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    public static function attributes(): array
    {
        return [
            'title' => 'заголовок',
            'content' => 'содержание',
        ];
    }
}
