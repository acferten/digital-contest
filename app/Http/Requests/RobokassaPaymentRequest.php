<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RobokassaPaymentRequest extends FormRequest
{
    public static function rules(): array
    {
        return [
            'Shp_WorkId' => 'required|int|exists:works,id',
            'Shp_ProductId' => 'required|int|exists:products,id',
            'Shp_UserId' => 'required|int|exists:users,id',
            'OutSum' => 'required|int',
            'InvId' => 'required|int|unique:payments,invoice_id',
            'SignatureValue' => 'required|string'
        ];
    }
}
