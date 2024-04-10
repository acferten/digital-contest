<?php

namespace Domain\Products\DataTransferObjects;

use Domain\Products\Enums\OrderStatus;
use Domain\Products\Models\Product;
use Domain\Shared\Models\User;
use Domain\Work\Models\Work;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class RobokassaPaymentData extends Data
{
    public function __construct(
        public                      $work,
        public                      $product,
        public                      $user,
        public                      $out_sum,
        public                      $inv_id,
        public                      $signature_value,
        public readonly OrderStatus $status = OrderStatus::Pending,
    )
    {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
            'work' => Work::find($request->input('Shp_WorkId')),
            'product' => Product::find($request->input('Shp_ProductId')),
            'user' => User::find($request->input('Shp_UserId')),
            'inv_id' => $request->input('InvId'),
            'out_sum' => $request->input('OutSum'),
            'signature_value' => $request->input('SignatureValue'),
        ]);
    }

    public static function rules(): array
    {
        return [
            'Shp_WorkId' => 'required|int|exists:works,id',
            'Shp_ProductId' => 'required|int|exists:products,id',
            'Shp_UserId' => 'required|int|exists:users,id',
            'OutSum' => 'required|int',
            'InvId' => 'required|int',
            'SignatureValue' => 'required|string',
        ];
    }
}
