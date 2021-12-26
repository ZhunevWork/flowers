@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.quickOrder.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.quick-orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $quickOrder->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.bouquet') }}
                                    </th>
                                    <td>
                                        {{ $quickOrder->bouquet->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.size') }}
                                    </th>
                                    <td>
                                        @foreach($quickOrder->sizes as $key => $size)
                                            <span class="label label-info">{{ $size->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $quickOrder->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $quickOrder->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $quickOrder->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.quickOrder.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\QuickOrder::STATUS_SELECT[$quickOrder->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.quick-orders.index') }}">
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