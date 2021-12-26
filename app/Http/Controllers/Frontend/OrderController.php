<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Address;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Payment;
use App\Models\PromoCode;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['user', 'offers', 'promocode', 'status', 'payment', 'address'])->get();

        return view('frontend.orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offers = Offer::pluck('cart', 'id');

        $promocodes = PromoCode::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = OrderStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payments = Payment::pluck('transaction', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addresses = Address::pluck('city', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.orders.create', compact('users', 'offers', 'promocodes', 'statuses', 'payments', 'addresses'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->offers()->sync($request->input('offers', []));

        return redirect()->route('frontend.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offers = Offer::pluck('cart', 'id');

        $promocodes = PromoCode::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = OrderStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payments = Payment::pluck('transaction', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addresses = Address::pluck('city', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('user', 'offers', 'promocode', 'status', 'payment', 'address');

        return view('frontend.orders.edit', compact('users', 'offers', 'promocodes', 'statuses', 'payments', 'addresses', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->offers()->sync($request->input('offers', []));

        return redirect()->route('frontend.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('user', 'offers', 'promocode', 'status', 'payment', 'address');

        return view('frontend.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
