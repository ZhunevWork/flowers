@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.quickOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quick-orders.update", [$quickOrder->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="bouquet_id">{{ trans('cruds.quickOrder.fields.bouquet') }}</label>
                <select class="form-control select2 {{ $errors->has('bouquet') ? 'is-invalid' : '' }}" name="bouquet_id" id="bouquet_id" required>
                    @foreach($bouquets as $id => $entry)
                        <option value="{{ $id }}" {{ (old('bouquet_id') ? old('bouquet_id') : $quickOrder->bouquet->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bouquet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bouquet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quickOrder.fields.bouquet_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sizes">{{ trans('cruds.quickOrder.fields.size') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sizes') ? 'is-invalid' : '' }}" name="sizes[]" id="sizes" multiple required>
                    @foreach($sizes as $id => $size)
                        <option value="{{ $id }}" {{ (in_array($id, old('sizes', [])) || $quickOrder->sizes->contains($id)) ? 'selected' : '' }}>{{ $size }}</option>
                    @endforeach
                </select>
                @if($errors->has('sizes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sizes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quickOrder.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.quickOrder.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $quickOrder->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quickOrder.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.quickOrder.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $quickOrder->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quickOrder.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.quickOrder.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $quickOrder->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quickOrder.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.quickOrder.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\QuickOrder::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $quickOrder->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quickOrder.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection