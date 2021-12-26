<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::with(['media'])->first();
        if(!isset($_COOKIE['cart_id'])){
            $cart_id = uniqid();
            setcookie('cart_id', $cart_id);
        }
        else {
            $cart_id = $_COOKIE['cart_id'];
        }
        \Cart::session($cart_id);
        $cartTotal = isset($cart_id) ? \Cart::session($cart_id)->getTotalQuantity() : 0;
        return view('shop/delivery/index', compact('settings', 'cartTotal'));
    }
}
