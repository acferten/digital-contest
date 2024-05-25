<?php

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\RobokassaPaymentData;
use Domain\Products\Enums\ProductEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class SuccessfulPaymentRedirectAction
{
    public static function execute(RobokassaPaymentData $data): RedirectResponse|string
    {
        $mrh_pass1 = env('ROBOKASSA_PASSWORD_1');
        $my_crc = strtoupper(md5("$data->out_sum:$data->inv_id:$mrh_pass1:Shp_ProductId={$data->product->id}:Shp_UserId={$data->user->id}:Shp_WorkId={$data->work->id}"));

        if ($my_crc != strtoupper($data->signature_value)) {
            return "bad sign\n";
        }

        if ($data->product->name == ProductEnum::Voting->value) {
            return Redirect::route('works.show', $data->work->id)
                ->with('success', 'Оплата прошла успешно. Ваш голос за работу учтен.');
        } else {
            return Redirect::route('works.show', $data->work->id)
                ->with('success', 'Оплата прошла успешно. Ваша работа опубликована.');
        }
    }
}
