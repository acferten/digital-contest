<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Domain\Products\DataTransferObjects\RobokassaPaymentData;

class RobokassaPaymentController extends Controller
{
    public function result(RobokassaPaymentData $data)
    {
        $data->user->payments()->save($data->product, ['invoice_id' => $data->inv_id, 'work_id' => $data->work->id]);

        $mrh_pass2 = env('ROBOKASSA_PASSWORD_2');
        $my_crc = strtoupper(md5("$data->out_sum:$data->inv_id:$mrh_pass2:Shp_ProductId={$data->product->id}:Shp_UserId={$data->user->id}:Shp_WorkId={$data->work->id}"));

        if ($my_crc != $data->signature_value)
        {
            echo "bad sign\n";
            exit();
        }

        echo "OK$data->inv_id\n";
    }
}
