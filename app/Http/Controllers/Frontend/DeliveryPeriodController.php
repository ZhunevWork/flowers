<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeliveryPeriodRequest;
use App\Http\Requests\StoreDeliveryPeriodRequest;
use App\Http\Requests\UpdateDeliveryPeriodRequest;
use App\Models\DeliveryPeriod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveryPeriodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivery_period_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPeriods = DeliveryPeriod::all();

        return view('frontend.deliveryPeriods.index', compact('deliveryPeriods'));
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_period_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.deliveryPeriods.create');
    }

    public function store(StoreDeliveryPeriodRequest $request)
    {
        $deliveryPeriod = DeliveryPeriod::create($request->all());

        return redirect()->route('frontend.delivery-periods.index');
    }

    public function edit(DeliveryPeriod $deliveryPeriod)
    {
        abort_if(Gate::denies('delivery_period_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.deliveryPeriods.edit', compact('deliveryPeriod'));
    }

    public function update(UpdateDeliveryPeriodRequest $request, DeliveryPeriod $deliveryPeriod)
    {
        $deliveryPeriod->update($request->all());

        return redirect()->route('frontend.delivery-periods.index');
    }

    public function show(DeliveryPeriod $deliveryPeriod)
    {
        abort_if(Gate::denies('delivery_period_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.deliveryPeriods.show', compact('deliveryPeriod'));
    }

    public function destroy(DeliveryPeriod $deliveryPeriod)
    {
        abort_if(Gate::denies('delivery_period_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPeriod->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveryPeriodRequest $request)
    {
        DeliveryPeriod::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
