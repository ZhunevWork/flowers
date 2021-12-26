@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bouquetCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bouquet-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquetCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $bouquetCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquetCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $bouquetCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquetCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $bouquetCategory->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquetCategory.fields.image') }}
                        </th>
                        <td>
                            @if($bouquetCategory->image)
                                <a href="{{ $bouquetCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $bouquetCategory->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bouquet-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection