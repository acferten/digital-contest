<div class="col">
    <script defer type="text/javascript" src="https://auth.robokassa.ru/Merchant/bundle/robokassa_iframe.js"></script>
    <script defer>
        let form = document.getElementById('start-payment-button');

        form.addEventListener('click', (e) => {
            Robokassa.StartPayment({
                MerchantLogin: {{ $merchant_login }},
                OutSum: {{ $out_sum }},
                InvId: 10,
                Description: {{ $description }},
                SignatureValue: {{ $signature_value }}
            });

        });
    </script>

    @php
        $merchant_login = env('ROBOKASSA_LOGIN');
        $password_1 = env('ROBOKASSA_PASSWORD_1');
        $invid = 0;
        $description = \Domain\Products\Enums\ProductEnum::Voting->value;
        $out_sum = $product->price;
        $signature_value = md5("$merchant_login:$out_sum:$invid:$password_1");
    @endphp

    <button type="submit" id='start-payment-button' class="btn btn-danger float-end">Голосовать</button>

</div>
