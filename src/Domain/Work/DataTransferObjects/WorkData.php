<?php

namespace Domain\Work\DataTransferObjects;

use Spatie\LaravelData\Data;

class WorkData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $file,
    ) {
    }
}
