<?php

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\RobokassaPaymentData;
use Domain\Products\Enums\OrderStatus;
use Domain\Products\Enums\ProductEnum;
use Domain\Work\Enums\WorkStatus;

class CreatePaymentAction
{
    public static function execute(RobokassaPaymentData $data): string
    {
        $payment = $data->user->payments()->save($data->product, [
            'invoice_id' => $data->inv_id,
            'work_id' => $data->work->id,
        ]
        );

        $mrh_pass2 = env('ROBOKASSA_PASSWORD_2');
        $my_crc = strtoupper(
            md5("$data->out_sum:$data->inv_id:$mrh_pass2:Shp_ProductId={$data->product->id}:Shp_UserId={$data->user->id}:Shp_WorkId={$data->work->id}")
        );

        if ($my_crc != $data->signature_value) {
            return "bad sign\n";
        }

        $payment->payments()
            ->wherePivot('invoice_id', $data->inv_id)
            ->updateExistingPivot($data->user->id, ['status' => OrderStatus::Paid->value]);

        if ($data->product->name == ProductEnum::Voting->value) {
            $data->work->votes()->save($data->user);
        } else {
            $data->work->update(['status' => WorkStatus::Published->value]);
        }

        return "OK$data->inv_id\n";
    }
}
