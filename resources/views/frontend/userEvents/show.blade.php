@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.userEvent.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.user-events.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $userEvent->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $userEvent->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.event_type') }}
                                    </th>
                                    <td>
                                        {{ $userEvent->event_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $userEvent->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $userEvent->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.notification_today') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $userEvent->notification_today ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userEvent.fields.notification_before_three_day') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $userEvent->notification_before_three_day ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.user-events.index') }}">
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