<?php

namespace App\Http\Controllers\Shop;

use App\Filters\BouquetFilter;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\BouquetCategory;
use App\Models\Color;
use App\Models\Element;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BouquetFilter $filter, Request $request)
    {
        $settings = Setting::with(['media'])->first();
        $cartTotal = isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : 0;

        $bouquetCategories = BouquetCategory::with(['media'])->get();
        $elements = Element::whereHas('categories', function($q){
            $q->where('id', '1');
        })->get();
        $colors = Color::all();
        $events = Event::all();

        (isset($request->category_id) && $request->category_id !== 'all') ? $pageName = BouquetCategory::where('id', $request->category_id)->first()->name : $pageName = "Все букеты";

        $bouquets = Bouquet::filter($filter)->with(['elements', 'sizes', 'bouquetcategories', 'colors', 'events', 'media'])->paginate(12);

        if($request->ajax()){
            return view('shop/catalog/ajax', compact('settings', 'request', 'pageName', 'bouquetCategories', 'elements', 'colors', 'events', 'bouquets', 'cartTotal'))->render();
        }

        return view('shop/catalog/index', compact('settings', 'request', 'pageName', 'bouquetCategories', 'elements', 'colors', 'events', 'bouquets', 'cartTotal'));
    }
}
