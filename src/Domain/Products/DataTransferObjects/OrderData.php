<?php

namespace Domain\Products\DataTransferObjects;

use Domain\Products\Enums\OrderStatus;
use Domain\Products\Models\Product;
use Domain\Work\Models\Work;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class OrderData extends Data
{
    public function __construct(
        public readonly Work        $work,
        public readonly Product     $product,
        public readonly OrderStatus $status = OrderStatus::Pending,
    )
    {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            ...$request->all(),
            'work' => Work::find($request->input('work_id')),
            'product' => Product::find($request->input('product_id')),

        ]);
    }

    public static function rules(): array
    {
        return [
            'work_id' => 'required|int|exists:works,id',
            'product_id' => 'required|int|exists:products,id',
        ];
    }

    public static function attributes(): array
    {
        return [
            'work_id' => 'идентификатор работы',
            'product_id' => 'идентификатор товара',
        ];
    }
}
