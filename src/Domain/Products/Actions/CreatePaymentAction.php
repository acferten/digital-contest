<?php

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\RobokassaPaymentData;
use Domain\Products\Enums\OrderStatus;
use Domain\Products\Enums\ProductEnum;
use Domain\Work\Enums\WorkStatus;
use Illuminate\Support\Facades\Log;

class CreatePaymentAction
{
    public static function execute(RobokassaPaymentData $data): string
    {
        $payment = $data->user->payments()->save($data->product, [
            'invoice_id' => $data->inv_id,
            'work_id' => $data->work->id,
            'price' => $data->out_sum
        ]);

        $mrh_pass2 = env('ROBOKASSA_PASSWORD_2');
        $my_crc = strtoupper(
            md5("$data->out_sum:$data->inv_id:$mrh_pass2:Shp_ProductId={$data->product->id}:Shp_UserId={$data->user->id}:Shp_WorkId={$data->work->id}")
        );

        Log::debug($my_crc);
        Log::debug($data->signature_value);

        if ($my_crc != strtoupper($data->signature_value)) {
            return "bad sign\n";
        }

        $payment->payments()
            ->wherePivot('invoice_id', $data->inv_id)
            ->updateExistingPivot($data->user->id, ['status' => OrderStatus::Paid->value]);

        if ($data->product->name == ProductEnum::Voting->value) {
            $votes = (int)$data->out_sum / $data->product->price;

            for ($i = 1; $i <= $votes; $i++) {
                $data->work->votes()->save($data->user);
            }
        } else {
            $data->work->update(['status' => WorkStatus::Published->value]);
        }

        return "OK$data->inv_id\n";
    }
}
