<?php

use App\Http\Controllers\Products\RobokassaPaymentController;
use Illuminate\Support\Facades\Route;

Route::post('orders/payment', [RobokassaPaymentController::class, 'result']);
