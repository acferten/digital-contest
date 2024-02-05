<?php

namespace Domain\Partners\DataTransferObjects;

use Domain\Partners\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class PartnerData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly UploadedFile|string $logo,
    ) {
    }

    public static function fromModel(Partner $partner): self
    {
        return self::from([
            ...$partner->toArray(),
            'logo' => $partner->getLogoUrl(),
        ]);
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
            'id' => $request->route('partner')?->id,
            'logo' => $request->file('logo'),
        ]);
    }

    public static function rules(): array
    {
        return [
            'logo' => 'required|image|max:4192',
            'name' => 'required|string',
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
