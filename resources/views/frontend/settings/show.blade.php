@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.settings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $setting->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $setting->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($setting->logo)
                                            <a href="{{ $setting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $setting->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $setting->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $setting->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.vk') }}
                                    </th>
                                    <td>
                                        {{ $setting->vk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.instagram') }}
                                    </th>
                                    <td>
                                        {{ $setting->instagram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.youtube') }}
                                    </th>
                                    <td>
                                        {{ $setting->youtube }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.telegram') }}
                                    </th>
                                    <td>
                                        {{ $setting->telegram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.whats_app') }}
                                    </th>
                                    <td>
                                        {{ $setting->whats_app }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setting.fields.vyber') }}
                                    </th>
                                    <td>
                                        {{ $setting->vyber }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.settings.index') }}">
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