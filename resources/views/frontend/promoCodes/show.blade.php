@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.promoCode.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.promo-codes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $promoCode->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $promoCode->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\PromoCode::TYPE_SELECT[$promoCode->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.summ') }}
                                    </th>
                                    <td>
                                        {{ $promoCode->summ }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.percent') }}
                                    </th>
                                    <td>
                                        {{ $promoCode->percent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.is_active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $promoCode->is_active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.promoCode.fields.active_until') }}
                                    </th>
                                    <td>
                                        {{ $promoCode->active_until }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.promo-codes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection