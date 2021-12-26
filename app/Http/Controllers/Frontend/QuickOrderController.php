<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuickOrderRequest;
use App\Http\Requests\StoreQuickOrderRequest;
use App\Http\Requests\UpdateQuickOrderRequest;
use App\Models\Bouquet;
use App\Models\QuickOrder;
use App\Models\Size;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuickOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quick_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quickOrders = QuickOrder::with(['bouquet', 'sizes'])->get();

        return view('frontend.quickOrders.index', compact('quickOrders'));
    }

    public function create()
    {
        abort_if(Gate::denies('quick_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquets = Bouquet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::pluck('name', 'id');

        return view('frontend.quickOrders.create', compact('bouquets', 'sizes'));
    }

    public function store(StoreQuickOrderRequest $request)
    {
        $quickOrder = QuickOrder::create($request->all());
        $quickOrder->sizes()->sync($request->input('sizes', []));

        return redirect()->route('frontend.quick-orders.index');
    }

    public function edit(QuickOrder $quickOrder)
    {
        abort_if(Gate::denies('quick_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquets = Bouquet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::pluck('name', 'id');

        $quickOrder->load('bouquet', 'sizes');

        return view('frontend.quickOrders.edit', compact('bouquets', 'sizes', 'quickOrder'));
    }

    public function update(UpdateQuickOrderRequest $request, QuickOrder $quickOrder)
    {
        $quickOrder->update($request->all());
        $quickOrder->sizes()->sync($request->input('sizes', []));

        return redirect()->route('frontend.quick-orders.index');
    }

    public function show(QuickOrder $quickOrder)
    {
        abort_if(Gate::denies('quick_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quickOrder->load('bouquet', 'sizes');

        return view('frontend.quickOrders.show', compact('quickOrder'));
    }

    public function destroy(QuickOrder $quickOrder)
    {
        abort_if(Gate::denies('quick_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quickOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuickOrderRequest $request)
    {
        QuickOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
