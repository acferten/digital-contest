@php use Illuminate\Support\Facades\DB; @endphp
@props(['work', 'price' => null])

@auth('sanctum')
    @php
        if(auth()->user()
        ->payments()
        ->where('payments.status', \Domain\Products\Enums\OrderStatus::Paid)
        ->where('payments.work_id', $work->id)
        ->whereDate('payments.created_at', '=', date('Y-m-d'))
        ->sum('payments.price') >= 500) {
            \Illuminate\Support\Facades\Redirect::route('works.show', $work)->with('success', 'Вы не можеет');
        }
            $product = Domain\Products\Models\Product::where('name', \Domain\Products\Enums\ProductEnum::Voting->value)->first();
            $merchant_login = env('ROBOKASSA_LOGIN');
            $password_1 = env('ROBOKASSA_PASSWORD_1');
            $description = \Domain\Products\Enums\ProductEnum::Voting->value;
            $out_sum = $price ?? $product->price;
            $user_id = auth()->user()->id;
            $inv_id = (int)$work->id . $user_id . (time() % 1000);
            while (DB::table('payments')->where('invoice_id', $inv_id)->exists()) {
                $inv_id = (int)$work->id . $user_id . fake()->randomNumber(3);
            }
            $signature_value = md5("{$merchant_login}:{$out_sum}:{$inv_id}:{$password_1}:Shp_ProductId={$product->id}:Shp_UserId={$user_id}:Shp_WorkId={$work->id}");
    @endphp

    <div class="col">
        <form action="https://auth.robokassa.ru/Merchant/Index.aspx" method="get">
            <input type=hidden name=MerchantLogin value="{{ $merchant_login }}">
            <input type=hidden name=OutSum value="{{ $out_sum }}">
            <input type=hidden name=InvId value="{{ $inv_id }}">
            <input type=hidden name=Description value="{{ $description }}">
            <input type=hidden name=SignatureValue value="{{ $signature_value }}">
            <input type=hidden name=Shp_ProductId value="{{ $product->id }}">
            <input type=hidden name=Shp_UserId value="{{ $user_id }}">
            <input type=hidden name=Shp_WorkId value="{{ $work->id }}">
            <input type=hidden name=IsTest value=1>

            <button type="submit" id='start-payment-button' class="btn btn-danger float-end">{{$slot}}</button>
        </form>
    </div>

@endauth
