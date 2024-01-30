<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Domain\Products\DataTransferObjects\OrderData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderPaymentController extends Controller
{
    public function create(OrderData $data): OrderData
    {
        Auth::user()->orders()->save($data->product, ['work_id', $data->work->id]);

        return $data;
    }

    public function result(Request $request)
    {
        //
    }
}
