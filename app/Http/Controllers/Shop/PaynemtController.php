<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Service\PaymentService;
use Illuminate\Http\Request;

class PaynemtController extends Controller
{
    public function index()
    {

    }

    public function create(PaymentService $service, Request $request)
    {
        $amount = (float)$request->input('amount');
    }

    public function callback()
    {

    }
}
