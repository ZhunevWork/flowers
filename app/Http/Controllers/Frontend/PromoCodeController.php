<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPromoCodeRequest;
use App\Http\Requests\StorePromoCodeRequest;
use App\Http\Requests\UpdatePromoCodeRequest;
use App\Models\PromoCode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromoCodeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promo_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promoCodes = PromoCode::all();

        return view('frontend.promoCodes.index', compact('promoCodes'));
    }

    public function create()
    {
        abort_if(Gate::denies('promo_code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.promoCodes.create');
    }

    public function store(StorePromoCodeRequest $request)
    {
        $promoCode = PromoCode::create($request->all());

        return redirect()->route('frontend.promo-codes.index');
    }

    public function edit(PromoCode $promoCode)
    {
        abort_if(Gate::denies('promo_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.promoCodes.edit', compact('promoCode'));
    }

    public function update(UpdatePromoCodeRequest $request, PromoCode $promoCode)
    {
        $promoCode->update($request->all());

        return redirect()->route('frontend.promo-codes.index');
    }

    public function show(PromoCode $promoCode)
    {
        abort_if(Gate::denies('promo_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.promoCodes.show', compact('promoCode'));
    }

    public function destroy(PromoCode $promoCode)
    {
        abort_if(Gate::denies('promo_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promoCode->delete();

        return back();
    }

    public function massDestroy(MassDestroyPromoCodeRequest $request)
    {
        PromoCode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
