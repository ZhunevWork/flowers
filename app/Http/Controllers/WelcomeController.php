<?php

namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\BouquetCategory;
use App\Models\Color;
use App\Models\Element;
use App\Models\ElementCategory;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::with(['media'])->first();
        $cartTotal = isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : 0;

        $bouquetCategories = BouquetCategory::with(['media'])->get();
        $elements = Element::whereHas('categories', function($q){
            $q->where('id', '1');
        })->get();
        $colors = Color::all();
        $events = Event::all();
        $hits = Bouquet::whereHas('bouquetcategories', function($q){
            $q->where('id', '8');
        })->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->limit(4)->get();
        $authors = Bouquet::whereHas('bouquetcategories', function($q){
            $q->where('id', '3');
        })->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->limit(4)->get();
        $compositions = Bouquet::whereHas('bouquetcategories', function($q){
            $q->where('id', '4');
        })->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->limit(4)->get();
        $presents = Bouquet::whereHas('bouquetcategories', function($q){
            $q->where('id', '6');
        })->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->limit(4)->get();

        return view('welcome', compact('settings', 'bouquetCategories', 'elements', 'colors', 'events', 'hits', 'authors', 'compositions', 'presents', 'cartTotal'));
    }
}
