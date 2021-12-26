<?php

namespace App\Http\Controllers\Shop;

use App\Filters\ElementFilter;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Element;
use App\Models\ElementCategory;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ElementFilter $filter, Request $request)
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
        $elementCategories = ElementCategory::with(['media'])->get();
        $colors = Color::all();

        $elements = Element::filter($filter)->with(['categories', 'colors', 'media'])->paginate(12);

        return view('shop/constructor/index', compact('settings', 'request', 'elementCategories', 'elements', 'colors', 'cartTotal'));
    }

}
