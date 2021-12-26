@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.offer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.offers.update", [$offer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="cart">{{ trans('cruds.offer.fields.cart') }}</label>
                            <input class="form-control" type="number" name="cart" id="cart" value="{{ old('cart', $offer->cart) }}" step="1" required>
                            @if($errors->has('cart'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cart') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.cart_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bouquet_id">{{ trans('cruds.offer.fields.bouquet') }}</label>
                            <select class="form-control select2" name="bouquet_id" id="bouquet_id">
                                @foreach($bouquets as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('bouquet_id') ? old('bouquet_id') : $offer->bouquet->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="size_id" id="size_id">
                                @foreach($sizes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('size_id') ? old('size_id') : $offer->size->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="count" id="count" value="{{ old('count', $offer->count) }}" step="1">
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

        </div>
    </div>
</div>
@endsection