<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferRequest;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Bouquet;
use App\Models\Offer;
use App\Models\Size;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offers = Offer::with(['bouquet', 'size'])->get();

        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        abort_if(Gate::denies('offer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquets = Bouquet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::pluck('multiplier', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.offers.create', compact('bouquets', 'sizes'));
    }

    public function store(StoreOfferRequest $request)
    {
        $offer = Offer::create($request->all());

        return redirect()->route('admin.offers.index');
    }

    public function edit(Offer $offer)
    {
        abort_if(Gate::denies('offer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bouquets = Bouquet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::pluck('multiplier', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offer->load('bouquet', 'size');

        return view('admin.offers.edit', compact('bouquets', 'sizes', 'offer'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());

        return redirect()->route('admin.offers.index');
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->load('bouquet', 'size');

        return view('admin.offers.show', compact('offer'));
    }

    public function destroy(Offer $offer)
    {
        abort_if(Gate::denies('offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferRequest $request)
    {
        Offer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
