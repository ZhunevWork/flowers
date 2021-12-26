@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bouquet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bouquets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.id') }}
                        </th>
                        <td>
                            {{ $bouquet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.name') }}
                        </th>
                        <td>
                            {{ $bouquet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.description') }}
                        </th>
                        <td>
                            {{ $bouquet->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.durability') }}
                        </th>
                        <td>
                            {{ $bouquet->durability }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.element') }}
                        </th>
                        <td>
                            @foreach($bouquet->elements as $key => $element)
                                <span class="label label-info">{{ $element->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.size') }}
                        </th>
                        <td>
                            @foreach($bouquet->sizes as $key => $size)
                                <span class="label label-info">{{ $size->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.bouquetcategory') }}
                        </th>
                        <td>
                            @foreach($bouquet->bouquetcategories as $key => $bouquetcategory)
                                <span class="label label-info">{{ $bouquetcategory->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.color') }}
                        </th>
                        <td>
                            @foreach($bouquet->colors as $key => $color)
                                <span class="label label-info">{{ $color->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.event') }}
                        </th>
                        <td>
                            @foreach($bouquet->events as $key => $event)
                                <span class="label label-info">{{ $event->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.height') }}
                        </th>
                        <td>
                            {{ $bouquet->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.all_size') }}
                        </th>
                        <td>
                            {{ $bouquet->all_size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.price') }}
                        </th>
                        <td>
                            {{ $bouquet->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.discount_price') }}
                        </th>
                        <td>
                            {{ $bouquet->discount_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.in_stock') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $bouquet->in_stock ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bouquet.fields.images') }}
                        </th>
                        <td>
                            @foreach($bouquet->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bouquets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection