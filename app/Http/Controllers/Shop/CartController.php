<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Setting;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::with(['media'])->first();
        $cartTotal = isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : 0;
        $hits = Bouquet::whereHas('bouquetcategories', function($q){
            $q->where('id', '8');
        })->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->limit(12)->get()->random(4);
        $cartBouquets = \Cart::getContent();

        $delivery = 250;
        $discount = 1000;
        $allProductsPrice =  \Cart::getSubTotal();
        $cartTotalPrice = $allProductsPrice + $delivery;
        if(isset($discount)){
            $cartTotalPrice -= $discount;
            return view('shop/cart/index', compact('settings', 'cartTotal', 'hits', 'cartBouquets', 'delivery', 'discount', 'cartTotalPrice'));
        } else {
            return view('shop/cart/index', compact('settings', 'cartTotal', 'hits', 'cartBouquets', 'delivery', 'cartTotalPrice'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $bouquet = Bouquet::where('id', $request->id)->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->first();
        if(!isset($_COOKIE['cart_id'])){
            $cart_id = uniqid();
            setcookie('cart_id', $cart_id);
        }
        else {
            $cart_id = $_COOKIE['cart_id'];
        }
        \Cart::session($cart_id);
        \Cart::add([
            'id'   => $request['attributes']['size'] . $bouquet->id,
            'name' => $bouquet->name,
            'price'=> ($bouquet->discount_price ? $bouquet->discount_price : $bouquet->price) * ($bouquet->sizes->where('name', $request['attributes']['size'])->first()->multiplier),
            'quantity' => (int) $request->quantity,
            'attributes' => [
                'bouquet_id' => $bouquet->id,
                'size' => (string) $request['attributes']['size'],
                'img' => (string) $bouquet->images->first()->url,
                'is_constructor' => false
            ]
        ]);

        return response()->json(\Cart::getContent());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
