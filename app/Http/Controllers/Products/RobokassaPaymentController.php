<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\RobokassaPaymentRequest;
use Domain\Products\DataTransferObjects\RobokassaPaymentData;
use Domain\Products\Enums\OrderStatus;
use Domain\Products\Enums\ProductEnum;
use Domain\Products\Models\Product;
use Domain\Shared\Models\User;
use Domain\Work\Enums\WorkStatus;
use Domain\Work\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class RobokassaPaymentController extends Controller
{
    public function result(RobokassaPaymentData $data)
    {
        Log::debug($data->product->name);
        die();

        $work = Work::find($request->input('Shp_WorkId'));
        $product = Product::find($request->input('Shp_ProductId'));
        $user = User::find($request->input('Shp_UserId'));
        $inv_id = $request->input('InvId');
        $out_sum = $request->input('OutSum');
        $signature_value = $request->input('SignatureValue');

        $payment = $user->payments()->save($product, ['invoice_id' => $inv_id, 'work_id' => $work->id]);

        $mrh_pass2 = env('ROBOKASSA_PASSWORD_2');
        $my_crc = strtoupper(md5("$out_sum:$inv_id:$mrh_pass2:Shp_ProductId={$product->id}:Shp_UserId={$user->id}:Shp_WorkId={$work->id}"));

        if ($my_crc != $signature_value) {
            return "bad sign\n";
        }

        $payment->payments()
            ->wherePivot('invoice_id', $inv_id)
            ->updateExistingPivot($user->id, ['status' => OrderStatus::Paid->value]);

        if ($product->name == ProductEnum::Voting->value) {
            $work->votes()->save($user);
        } else {
            $work->update(['status' => WorkStatus::Published->value]);
        }

        return "OK$inv_id\n";
    }

    public function success(Request $request)
    {
        $work = Work::find($request->input('Shp_WorkId'));
        $product = Product::find($request->input('Shp_ProductId'));
        $user = User::find($request->input('Shp_UserId'));
        $inv_id = $request->input('InvId');
        $out_sum = $request->input('OutSum');
        $signature_value = $request->input('SignatureValue');

        $mrh_pass1 = env('ROBOKASSA_PASSWORD_1');
        $my_crc = strtoupper(md5("$out_sum:$inv_id:$mrh_pass1:Shp_ProductId={$product->id}:Shp_UserId={$user->id}:Shp_WorkId={$work->id}"));

        if ($my_crc != $signature_value) {
            return "bad sign\n";
        }

        if ($product->name == ProductEnum::Voting->value) {
            return Redirect::route('works.show', $work->id)->with('success', 'Оплата прошла успешно. Ваш голос за работу учтен.');
        } else {
            return Redirect::route('works.show', $work->id)->with('success', 'Оплата прошла успешно. Ваша работа опубликована.');
        }

    }
}
