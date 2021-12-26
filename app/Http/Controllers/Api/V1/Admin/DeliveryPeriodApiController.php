<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryPeriodRequest;
use App\Http\Requests\UpdateDeliveryPeriodRequest;
use App\Http\Resources\Admin\DeliveryPeriodResource;
use App\Models\DeliveryPeriod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveryPeriodApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivery_period_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeliveryPeriodResource(DeliveryPeriod::all());
    }

    public function store(StoreDeliveryPeriodRequest $request)
    {
        $deliveryPeriod = DeliveryPeriod::create($request->all());

        return (new DeliveryPeriodResource($deliveryPeriod))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DeliveryPeriod $deliveryPeriod)
    {
        abort_if(Gate::denies('delivery_period_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeliveryPeriodResource($deliveryPeriod);
    }

    public function update(UpdateDeliveryPeriodRequest $request, DeliveryPeriod $deliveryPeriod)
    {
        $deliveryPeriod->update($request->all());

        return (new DeliveryPeriodResource($deliveryPeriod))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeliveryPeriod $deliveryPeriod)
    {
        abort_if(Gate::denies('delivery_period_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryPeriod->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
