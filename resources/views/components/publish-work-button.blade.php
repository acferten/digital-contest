@props(['work'])

@auth('sanctum')
    @php
        $product = Domain\Products\Models\Product::where('name', \Domain\Products\Enums\ProductEnum::Publish->value)->first();
        $merchant_login = env('ROBOKASSA_LOGIN');
        $password_1 = env('ROBOKASSA_PASSWORD_1');
        $description = \Domain\Products\Enums\ProductEnum::Publish->value;
        $out_sum = $product->price;
        $user_id = auth()->user()->id;
        $inv_id = (int)(((int)($work->id . $user_id . time())) / 10000);
        $signature_value = md5("{$merchant_login}:{$out_sum}:{$inv_id}:{$password_1}:Shp_ProductId={$product->id}:Shp_UserId={$user_id}:Shp_WorkId={$work->id}");
    @endphp

    @once
        <script defer type="text/javascript" src="https://auth.robokassa.ru/Merchant/bundle/robokassa_iframe.js"></script>
        <script defer>
            function publish(work_id, product_id, user_id, inv_id, signature_value) {
                Robokassa.StartPayment({
                    MerchantLogin: '{{ $merchant_login }}',
                    OutSum: {{ $out_sum }},
                    InvId: inv_id,
                    Description: '{{ $description }}',
                    Shp_ProductId: product_id,
                    Shp_UserId: user_id,
                    Shp_WorkId: work_id,
                    SignatureValue: signature_value
                });
            }
        </script>
    @endonce
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

            <button type="submit" id='start-payment-button' class="btn btn-danger ml-4"
                {{--                onclick="publish({{ $work->id }},{{ $product->id }},{{ $user_id }},{{ $inv_id }},'{{ md5("{$merchant_login}:{$out_sum}:{$inv_id}:{$password_1}:Shp_UserId={$user_id}:Shp_ProductId={$product->id}:Shp_WorkId={$work->id}") }}')">--}}
            >Оплатить и разместить
            </button>
        </form>

@endauth
