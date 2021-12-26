@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.address.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.addresses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $address->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $address->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.street') }}
                                    </th>
                                    <td>
                                        {{ $address->street }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.home') }}
                                    </th>
                                    <td>
                                        {{ $address->home }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.entrance') }}
                                    </th>
                                    <td>
                                        {{ $address->entrance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.floor') }}
                                    </th>
                                    <td>
                                        {{ $address->floor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.apartment') }}
                                    </th>
                                    <td>
                                        {{ $address->apartment }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.intercom') }}
                                    </th>
                                    <td>
                                        {{ $address->intercom }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.addresses.index') }}">
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