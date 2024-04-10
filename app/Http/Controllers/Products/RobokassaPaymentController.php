<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Domain\Products\Actions\CreatePaymentAction;
use Domain\Products\Actions\SuccessfulPaymentRedirectAction;
use Domain\Products\DataTransferObjects\RobokassaPaymentData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RobokassaPaymentController extends Controller
{
    public function result(Request $request): string
    {
        $data = RobokassaPaymentData::fromRequest($request);

        return CreatePaymentAction::execute($data);
    }

    public function success(Request $request): RedirectResponse
    {
        $data = RobokassaPaymentData::fromRequest($request);

        return SuccessfulPaymentRedirectAction::execute($data);
    }
}
