<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\RobokassaPaymentRequest;
use Domain\Products\Models\Product;
use Domain\Work\Models\Work;
use Illuminate\Support\Facades\Log;

class RobokassaPaymentController extends Controller
{
    public function result(RobokassaPaymentRequest $request)
    {
        Log::debug('result started');

        $work = Work::find($request->input('Shp_WorkId'));
        $product = Product::find($request->input('Shp_ProductId'));
        $user = Product::find($request->input('Shp_UserId'));
        $inv_id = $request->input('InvId');
        $out_sum = $request->input('OutSum');
        $signature_value = $request->input('SignatureValue');

        Log::debug('data created');

        $user->payments()->save($product, ['invoice_id' => $inv_id, 'work_id' => $work->id]);

        $mrh_pass2 = env('ROBOKASSA_PASSWORD_2');
        $my_crc = strtoupper(md5("$out_sum:$inv_id:$mrh_pass2:Shp_ProductId={$product->id}:Shp_UserId={$user->id}:Shp_WorkId={$work->id}"));

        if ($my_crc != $signature_value)
        {
            Log::debug('in condition');
            return "bad sign\n";
            exit();
        }
        Log::debug('done');
        return "OK$inv_id\n";
    }
}
