@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.offer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="cart">{{ trans('cruds.offer.fields.cart') }}</label>
                <input class="form-control {{ $errors->has('cart') ? 'is-invalid' : '' }}" type="number" name="cart" id="cart" value="{{ old('cart', '') }}" step="1" required>
                @if($errors->has('cart'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cart') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.cart_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bouquet_id">{{ trans('cruds.offer.fields.bouquet') }}</label>
                <select class="form-control select2 {{ $errors->has('bouquet') ? 'is-invalid' : '' }}" name="bouquet_id" id="bouquet_id">
                    @foreach($bouquets as $id => $entry)
                        <option value="{{ $id }}" {{ old('bouquet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bouquet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bouquet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.bouquet_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="size_id">{{ trans('cruds.offer.fields.size') }}</label>
                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size_id" id="size_id">
                    @foreach($sizes as $id => $entry)
                        <option value="{{ $id }}" {{ old('size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count">{{ trans('cruds.offer.fields.count') }}</label>
                <input class="form-control {{ $errors->has('count') ? 'is-invalid' : '' }}" type="number" name="count" id="count" value="{{ old('count', '1') }}" step="1">
                @if($errors->has('count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.count_helper') }}</span>
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