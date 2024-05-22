<?php

namespace Domain\Work\DataTransferObjects;

use Domain\Work\Models\Work;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;

class WorkVoteData extends Data
{
    public function __construct(
        #[WithoutValidation]
        public readonly Work $work,
        public readonly int  $amount = 1
    )
    {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
            'work' => Work::find($request->route('work')),
        ]);
    }

    public static function rules(): array
    {
        return [
            'amount' => 'required|int',
        ];
    }

    public static function attributes(): array
    {
        return [
            'amount' => 'количество',
        ];
    }
}
