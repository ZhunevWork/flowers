@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.quickOrder.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.quick-orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="bouquet_id">{{ trans('cruds.quickOrder.fields.bouquet') }}</label>
                            <select class="form-control select2" name="bouquet_id" id="bouquet_id" required>
                                @foreach($bouquets as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bouquet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="sizes[]" id="sizes" multiple required>
                                @foreach($sizes as $id => $size)
                                    <option value="{{ $id }}" {{ in_array($id, old('sizes', [])) ? 'selected' : '' }}>{{ $size }}</option>
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
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quickOrder.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.quickOrder.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quickOrder.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone">{{ trans('cruds.quickOrder.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quickOrder.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.quickOrder.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\QuickOrder::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', 'new') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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

        </div>
    </div>
</div>
@endsection