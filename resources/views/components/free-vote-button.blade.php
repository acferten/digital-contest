@props(['work'])

@auth('sanctum')

    @php
        $product = Domain\Products\Models\Product::where('name', \Domain\Products\Enums\ProductEnum::Voting->value)->first();
        $merchant_login = env('ROBOKASSA_LOGIN');
        $password_1 = env('ROBOKASSA_PASSWORD_1');
        $description = \Domain\Products\Enums\ProductEnum::Voting->value;
        $out_sum = $product->price;
        $user_id = auth()->user()->id;
        $inv_id = (int)(((int)($work->id . $user_id . time())) / 1000000);
        $signature_value = md5("{$merchant_login}:{$out_sum}:{$inv_id}:{$password_1}:Shp_ProductId={$product->id}:Shp_UserId={$user_id}:Shp_WorkId={$work->id}");
    @endphp


    <div class="col">
        <form action="{{route('voting_confirmation', $work)}}" method="get">
            <button type="submit" id='start-payment-button' class="btn btn-danger float-end">Голосовать</button>
        </form>
    </div>

@endauth
