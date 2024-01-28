<div class="col">
    @php
             $merchant_login = env('ROBOKASSA_LOGIN');
             $password_1 = env('ROBOKASSA_PASSWORD_1');
             $invid = 0;
             $description = \Domain\Products\Enums\ProductEnum::Voting->value;
             $out_sum = "8.96";
             $signature_value = md5("$merchant_login:$out_sum:$invid:$password_1");
    @endphp

    <form method="GET" action="https://auth.robokassa.ru/Merchant/PaymentForm/">
        @csrf
        <button type="submit" class="btn btn-danger float-end">Голосовать</button>
    </form>
</div>
